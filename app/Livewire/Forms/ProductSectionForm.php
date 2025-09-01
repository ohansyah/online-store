<?php

namespace App\Livewire\Forms;

use App\Models\Product;
use App\Models\ProductSection;
use App\Services\Session;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProductSectionForm extends Component
{
    public string $sectionName;
    public array $productIds = [];
    public $currentProducts = [];

    protected $rules = [
        'sectionName' => 'required|in:popular,discount',
        'productIds' => 'required|array|max:8',
        'productIds.*' => 'required|integer',
    ];

    public function mount($sectionName)
    {
        $this->sectionName = $sectionName;
        $this->productIds = ProductSection::select('product_id')
            ->where('section_name', $this->sectionName)
            ->pluck('product_id')
            ->toArray();

        $this->currentProducts = Product::select('id', 'name', 'price', 'image')
            ->whereIn('id', $this->productIds)
            ->get()
            ->map(function ($item) {
                return (object) [
                    'id' => $item->id,
                    'name' => $item->name,
                    'image_url' => $item->image_url,
                    'price_formatted' => $item->price_formatted,
                ];
            });
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();
        try {

            ProductSection::where('section_name', $this->sectionName)->delete();
            foreach ($this->productIds as $productId) {
                $productSectionInserts = [
                    'section_name' => $this->sectionName,
                    'product_id' => $productId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
            ProductSection::insert($productSectionInserts);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Session::error(__('error_update') . ' ' . __('product_section') . ' ' . $this->sectionName . '. ' . $e->getMessage());
            return redirect()->route('admin.product-section.index');
        }

        Session::success(__('success_update') . ' ' . __('product_section') . ' ' . $this->sectionName);
        return redirect()->route('admin.product-section.index');
    }

    public function render()
    {
        return view('livewire.forms.product-section-form');
    }
}

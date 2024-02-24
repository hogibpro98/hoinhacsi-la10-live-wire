<?php

namespace App\Http\Livewire\Admin\TopPartner;

use App\Models\Partner;
use App\Models\TopPartner;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class DataEntry extends Component
{
    use WithFileUploads;

    public $editId = '';

    public $topPartner;

    public $thatUp = 'Top Partner';

    public $that = 'top-partner';

    public $sequence;

    public $partner_id;

    public $search_category = '';

    public $top_partner_selected_parent = 'Choose Partner';

    protected $listeners = [
        //        'removePhoto',
    ];

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'sequence.required' => 'Bắt buộc nhập',
            'sequence.unique' => 'Tên danh mục đã tồn tại',
        ];
    }

    public function submit()
    {
        $this->validate([
            'sequence' => ['required', Rule::unique('top_partners')->ignore($this->editId)],
            'partner_id' => ['required', Rule::unique('top_partners')->ignore($this->editId)],
        ]);

        // Tạo mảng dữ liệu cho mô hình Top Partner
        $form = [
            'sequence' => $this->sequence,
            'partner_id' => $this->partner_id,
        ];

        // Tạo hoặc cập nhật mô hình Top Partner
        if ($this->editId != '' && $this->topPartner) {
            $this->topPartner->update($form);
            session()->flash('success', 'Top Partner updated successfully.');
            $this->emit('showSuccessUpdated');
        } else {
            $this->topPartner = TopPartner::create($form);
            session()->flash('success', 'Top Partner created successfully.');
            $this->emit('showSuccessCreated');
            dd($this->search_category);
        }
    }

    public function mount($id = '')
    {
        if ($id != '') {
            $this->topPartner = TopPartner::find($id);
            $this->editId = $this->topPartner->id;
            $this->sequence = $this->topPartner->sequence;
            $this->top_partner_selected_parent = $this->topPartner->partner->name ?? $this->top_partner_selected_parent;
        }
    }

    private function resetForm()
    {
        $this->sequence = '';
    }

    public function updateParentCategory($value)
    {
        if ($value == 0) {
            $this->partner_id = null;
            $this->top_partner_selected_parent = 'Choose Partner';
        } else {
            $this->partner_id = $value;
            $this->top_partner_selected_parent = Partner::find($value)->name;
        }
    }

    public function render()
    {
        return view('livewire.admin.top-partner.data-entry',
            [
                'result_search_category' => Partner::where('name', 'like', '%'.$this->search_category.'%')->whereNotIn('id', [$this->editId])->get(),
            ]);
    }
}

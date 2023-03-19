<?php

namespace App\Http\Requests;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;

class IndexAdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "search" => ['sometimes', 'nullable', 'string'],
        ];
    }

    private function baseQuery(): Builder
    {
        return Advertisement::with(['keywords', 'address']);
    }

    public function filter(): Builder
    {
        return $this->baseQuery()
            ->searchWithKeywordName($this->collect('keywords')->toArray())
            ->searchInTitle($this->input('search'))
            ->searchInDescription($this->input('search'));
    }
}

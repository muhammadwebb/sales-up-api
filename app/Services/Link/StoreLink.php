<?php

namespace App\Services\Link;

use App\Models\Bot;
use App\Models\Link;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;
use Str;

class StoreLink extends BaseService
{
    public function rules(): array
    {
        return [
            'source_id' => 'required|exists:sources,id',
            'price' => 'required|integer'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $company = auth()->user()->companies->where('is_current_active', true)->first();
        $bot = Bot::where('company_id', $company->id)->first();
        $code = Str::random(15);
        Link::create([
            'source_id' => $data['source_id'],
            'url' => $bot->username.'?start='.$code,
            'code' => $code,
            'price' => $data['price']
        ]);
        return true;
    }
}

<?php

namespace App\Services\Message;

use App\Models\Lead;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class SendAllMessage extends BaseService
{
    public function rules(): array
    {
        return [
            'text' => 'required|string|max:255'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $leads = Lead::all();
        dd($leads);
        return true;
    }
}

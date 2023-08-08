<?php

namespace App\Services\Status;

use App\Models\Status;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class StoreStatus extends BaseService
{
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:3'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        Status::create($data);
        return true;
    }
}

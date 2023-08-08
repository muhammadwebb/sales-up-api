<?php

namespace App\Services\Status;

use App\Models\Status;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class UpdateStatus extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:statuses,id'
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        Status::where('id', $data['id'])->update($data[0]);
        return true;
    }
}

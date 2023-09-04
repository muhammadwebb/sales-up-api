<?php

namespace App\Services\Lead;

use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class IndexLeadService extends BaseService
{
    public function rules(): array
    {
        return [
            //
        ];
    }

    /**
     * @throws ValidationException
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        return true;
    }
}

<?php

namespace App\Services\Order;

use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class IndexOrderService extends BaseService
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

<?php

namespace App\Services\Source;

use App\Models\Company;
use App\Models\Source;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class DeleteSource extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:sources,id'
        ];
    }

    /**
     * @throws ValidationException
     * @throws \Exception
     */
    public function execute(array $data): bool
    {
        $this->validate($data);
        $company = Company::where('is_current_active', true)->first();
        $source = Source::find($data['id']);
        if ($source->company_id == $company->id){
            $source->delete();
        } else{
            throw new \Exception('You cannot deleted this source',403);
        }
        return true;
    }
}

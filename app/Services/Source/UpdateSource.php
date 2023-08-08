<?php

namespace App\Services\Source;

use App\Models\Company;
use App\Models\Source;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Validation\ValidationException;

class UpdateSource extends BaseService
{
    public function rules(): array
    {
        return [
            'id' => 'required|exists:sources,id',
            'type_id' => 'required|exists:types,id',
            'title' => 'string|nullable'
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
            $source->update([
                'type_id' => $data['type_id'],
                'title' => $data['title'],
            ]);
        } else{
            throw new \Exception('You cannot updated this source',403);
        }
        return true;
    }
}

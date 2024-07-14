<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Company as Companys;

class Company extends Component
{

    public $companies, $name, $description, $email, $phone, $address, $logo, $website, $updateCompany = false, $addCompany = false;

    /**
     * delete action lister
     */
    protected $listeners = [
        'deleteCompanyListener' => 'deleteCompany'
    ];


    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'email' => 'required|email|unique:companies,email',
        'phone' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'logo' => 'required|string|max:255',
        // 'logo' =>'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'website' => 'nullable|url'
    ];


    /**
     * Resetting all inputted fields
     * @return void
     */
    public function resetFields()
    {
        $this->name = '';
        $this->description = '';
        $this->email = '';
        $this->phone = '';
        $this->address = '';
        $this->logo = '';
        $this->website = '';
    }

    /**
     * Render the company data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        $this->companies = Companys::select('id', 'name', 'description', 'email', 'phone', 'address', 'logo', 'website')->get();
        return view('livewire.company');
    }

    /**
     * Open add company form
     *@return void
     */
    public function addCompanies()
    {
        $this->resetFields();
        $this->addCompany = true;
        $this->updateCompany = false;
    }

    /**
     * Store the user's inputted company information in the company table
     * @return void
     */
    public function storeCompany()
    {
        $this->validate();
        try {
            Companys::create([
                'name' => $this->name,
                'description' => $this->description,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'logo' => $this->logo,
                'website' => $this->website
            ]);
            session()->flash('success', 'Company created successfully!');
            $this->resetFields();
            $this->addCompany = false;
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong!');
        }
    }

    /**
     * Show existing company data in edit company form
     * @param mixed $id
     * @return void
     */
    public function editCompany($id)
    {
        $this->addCompany = false;
        $this->updateCompany = true;
        try {
            $company = Companys::findOrFail($id);
            if (!$company) {
                session()->flash('error', 'Company not found');
            } else {
                $this->name = $company->name;
                $this->description = $company->description;
                $this->email = $company->email;
                $this->phone = $company->phone;
                $this->logo = $company->logo;
                $this->address = $company->address;
                $this->website = $company->website;
            }
        } catch (\Exception $e) {
            session()->flash('error', 'Something went wrong!');
        }
    }

    /**
     * update the company data
     * @return void
     */
    public function updateCompanies()
    {
        $this->validate();
        try {
            Companys::whereId($this->postId)->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'address' => $this->address,
                'website' => $this->website,
                'logo' => $this->logo,
                'description' => $this->description
            ]);
            session()->flash('success','Post Updated Successfully!!');
            $this->resetFields();
            $this->updateCompany= false;
        } catch (\Exception $ex) {
            session()->flash('success','Something goes wrong!!');
        }
    }

    /**
     * Cancel Add/Edit form and redirect to company listing page
     * @return void
     */
    public function cancelCompany()
    {
        $this->addCompany = false;
        $this->updateCompany = false;
        $this->resetFields();
    }

    /**
     * delete specific company data from the companies table
     * @param mixed $id
     * @return void
     */
    public function deleteCompany($id)
    {
        try{
            Companys::find($id)->delete();
            session()->flash('success',"Company Deleted Successfully!!");
        }catch(\Exception $e){
            session()->flash('error',"Something goes wrong!!");
        }
    }
}

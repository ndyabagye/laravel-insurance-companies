<div>
    <div class="mb-4 w-full lg:w-2/3">
        @if (session()->has('success'))
            <div class="alert bg-green-100 text-green-800 p-4 rounded-md mb-4" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert bg-red-100 text-red-800 p-4 rounded-md mb-4" role="alert">
                {{ session()->get('error') }}
            </div>
        @endif
        @if ($addCompany)
            @include('livewire.create')
        @endif
        @if ($updateCompany)
            @include('livewire.update')
        @endif
    </div>
    @if (!$addCompany)
        <button wire:click="addCompanies()"
            class="btn bg-blue-500 text-white text-sm py-2 px-4 rounded-md float-right mb-4">Add New Company</button>
    @endif
    <div class="w-full lg:w-2/3">
        <div class="card bg-white p-6 rounded-lg shadow-md">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border-b py-2 text-left">ID</th>
                                <th class="border-b py-2 text-left">Name</th>
                                <th class="border-b py-2 text-left">Email</th>
                                <th class="border-b py-2 text-left">Website</th>
                                <th class="border-b py-2 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($companies) > 0)
                                @foreach ($companies as $company)
                                    <tr>
                                        <td class="border-b py-2">
                                            {{ $company->id }}

                                        </td>
                                        <td class="border-b py-2">
                                            {{ $company->name }}

                                        </td>
                                        <td class="border-b py-2">
                                            {{ $company->email }}

                                        </td>
                                        <td class="border-b py-2">
                                            {{ $company->website }}
                                        </td>
                                        <td class="border-b py-2">
                                            <button wire:click="editCompany({{ $company->id }})"
                                                class="btn bg-blue-500 text-white text-sm py-1 px-3 rounded-md mr-2">Edit</button>
                                            <button wire:click="deleteCompany({{ $company->id }})"
                                                class="btn bg-red-500 text-white text-sm py-1 px-3 rounded-md">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        No company Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card p-6 bg-white shadow-md rounded-lg">
    <div class="card-body">
        <form>
            <div class="form-group mb-4">
                <label for="name" class="block text-gray-700">Name:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="name" placeholder="Enter name" wire:model="name">
                @error('name')
                    <span class="text-danger text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="email" class="block text-gray-700">Email:</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="email" placeholder="Enter email" wire:model="email">
                @error('email')
                    <span class="text-danger text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="address" class="block text-gray-700">Address:</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="address" placeholder="Enter address" wire:model="address">
                @error('address')
                    <span class="text-danger text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="website" class="block text-gray-700">Website:</label>
                <input type="text" class="form-control @error('website') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="website" placeholder="Enter website" wire:model="website">
                @error('website')
                    <span class="text-danger text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="logo" class="block text-gray-700">Logo:</label>
                <input type="text" class="form-control @error('logo') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="logo" placeholder="Enter logo" wire:model="logo">
                @error('logo')
                    <span class="text-danger text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="phone" class="block text-gray-700">Phone:</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="phone" placeholder="Enter phone" wire:model="phone">
                @error('phone')
                    <span class="text-danger text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-4">
                <label for="description" class="block text-gray-700">Description:</label>
                <textarea class="form-control @error('description') is-invalid @enderror mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="description" wire:model="description" placeholder="Enter Description"></textarea>
                @error('description')
                    <span class="text-danger text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="updateCompanies()" class="btn btn-success w-full bg-green-500 text-white py-2 rounded-md">Update</button>
                <button wire:click.prevent="cancelCompany()" class="btn btn-secondary w-full bg-gray-500 text-white py-2 rounded-md">Cancel</button>
            </div>
        </form>
    </div>
</div>

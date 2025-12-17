<div>
        <!-- Form Header -->
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">
                Apply for Your License
            </h2>
            <p class="mt-2 text-sm text-slate-600">
                Complete the form to apply for your digital driving license.
            </p>
        </div>
        <!-- The Card -->
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden border border-slate-100">  
            <!-- Progress Bar / Stepper -->
            <div class="bg-slate-50 border-b border-slate-100 p-6">
                <div class="relative flex items-center justify-between w-full">
                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 w-full h-1 bg-slate-200 -z-0"></div>
                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-indigo-600 transition-all duration-500 -z-0" :style="'width: ' + (($wire.currentStep - 1) / ($wire.totalSteps - 1) * 100) + '%'"></div>

                    <!-- Step 1 Indicator -->
                    <div class="relative z-10 bg-white p-1 rounded-full">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300 border-2"
                             :class="$wire.currentStep >= 1 ? 'border-indigo-600 bg-indigo-600 text-white' : 'border-slate-300 bg-white text-slate-500'">
                            <span x-show="$wire.currentStep > 1"><i class="fas fa-check">1</i></span>
                            <span x-show="$wire.currentStep <= 1">1</span>
                        </div>
                    </div>

                    <!-- Step 2 Indicator -->
                    <div class="relative z-10 bg-white p-1 rounded-full">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300 border-2"
                             :class="$wire.currentStep >= 2 ? 'border-indigo-600 bg-indigo-600 text-white' : 'border-slate-300 bg-white text-slate-500'">
                            <span x-show="$wire.currentStep > 2"><i class="fas fa-check"></i></span>
                            <span x-show="$wire.currentStep <= 2">2</span>
                        </div>
                    </div>

                    <!-- Step 3 Indicator -->
                    <div class="relative z-10 bg-white p-1 rounded-full">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300 border-2"
                             :class="$wire.currentStep >= 3 ? 'border-indigo-600 bg-indigo-600 text-white' : 'border-slate-300 bg-white text-slate-500'">
                            <span>3</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8">
                <form onsubmit="event.preventDefault();">   
                    <!-- Step 1 Content -->
                    <div x-show="$wire.currentStep === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Primary Details</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="pl-10 block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 transition shadow-sm"
                                    value="{{ auth()->user()->email }}" readonly>

                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Phone Number</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="fas fa-lock"></i></span>
                                    <input name="phone" type="text" wire:model="phone" class="pl-10 block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 transition shadow-sm" required>
                                </div>
                                @error('phone') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm font-medium text-slate-700 mb-1">Province</label>
                                <select name="province" wire:model="province" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 shadow-sm">
                                    <option value="">Select Province</option>
                                    <option value="Western">Western</option>
                                    <option value="Central">Central</option>
                                    <option value="Southern">Southern</option>
                                    <option value="Northern">Northern</option>
                                    <option value="Eastern">Eastern</option>
                                    <option value="North Western">North Western</option>
                                    <option value="North Central">North Central</option>
                                    <option value="Uva">Uva</option>
                                    <option value="Sabaragamuwa">Sabaragamuwa</option>
                                </select>
                                @error('province') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 Content -->
                    <div x-show="$wire.currentStep === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Medical </h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Province / Area</label>
                                <select wire:model="area" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 shadow-sm">
                                    <option value="">Select Province</option>
                                    <option value="Western">Western</option>
                                    <option value="Central">Central</option>
                                    <option value="Southern">Southern</option>
                                    <option value="Northern">Northern</option>
                                    <option value="Eastern">Eastern</option>
                                    <option value="North Western">North Western</option>
                                    <option value="North Central">North Central</option>
                                    <option value="Uva">Uva</option>
                                    <option value="Sabaragamuwa">Sabaragamuwa</option>
                                </select>
                                @error('area') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Blood Type</label>
                                <select wire:model="blood_type" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 shadow-sm">
                                    <option value="">Select Blood Type</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                @error('blood_type') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Vehicle Group</label>
                                <select wire:model="vehicle_group" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 shadow-sm">
                                    <option value="">Select Vehicle Group</option>
                                    <option value="motorcycle">Motorcycle</option>
                                    <option value="motorcar">Motorcar / Light Motor Vehicle</option>
                                    <option value="three_wheeler">Three-Wheeler</option>
                                    <option value="light_goods_vehicle">Light Goods Vehicle</option>
                                    <option value="heavy_goods_vehicle">Heavy Goods Vehicle</option>
                                    <option value="bus">Bus / Passenger Vehicle</option>
                                    <option value="tractor">Tractor</option>
                                    <option value="invalid_carriage">Invalid Carriage</option>
                                </select>
                                @error('vehicle_group') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                            </div>

                        </div>
                        <div class="mt-6">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Upload Medical Certificate</label>
                            <input type="file" wire:model="medical_image" class="block w-full text-sm text-slate-500 rounded-lg border border-slate-300 bg-slate-50 px-3 py-2.5 focus:border-indigo-500 focus:ring-indigo-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-700 transition cursor-pointer">
                            @error('medical_image') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <!-- Step 3 Content -->
                    <div x-show="$wire.currentStep === 3" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Review Details</h3>
                        
                        <div class="bg-indigo-50 rounded-lg p-6 border border-indigo-100 mb-6">
                            <dl class="space-y-4">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Email</dt>
                                    <dd class="text-sm font-semibold text-slate-900">{{ auth()->user()->email }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Name</dt>
                                    <dd class="text-sm font-semibold text-slate-900">{{ auth()->user()->name }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Phone</dt>
                                    <dd class="text-sm font-semibold text-slate-900">{{ $phone ?? '—' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Province</dt>
                                    <dd class="text-sm font-semibold text-slate-900">{{ $province ?? '—' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Area</dt>
                                    <dd class="text-sm font-semibold text-slate-900">{{ $area ?? '—' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Blood Type</dt>
                                    <dd class="text-sm font-semibold text-slate-900">{{ $blood_type ?? '—' }}</dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Vehicle Group</dt>
                                    <dd class="text-sm font-semibold text-slate-900 capitalize">{{ $vehicle_group ?? '—' }}</dd>
                                </div>
                            </dl>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" wire:model="terms" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-slate-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-medium text-slate-700">I agree to the <a href="#" class="text-indigo-600 hover:text-indigo-500">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Footer / Navigation Buttons -->
            <div class="px-8 py-5 bg-slate-50 border-t border-slate-100 flex justify-between items-center">
                
                <!-- Back Button -->
                <button 
                    wire:click="decreaseStep" 
                    x-show="$wire.currentStep > 1" 
                    class="inline-flex items-center px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </button>
                <div x-show="$wire.currentStep === 1"></div> <!-- Spacer -->
                <!-- Next Button -->
                <button 
                    wire:click="increaseStep" 
                    x-show="$wire.currentStep < 3"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Next Step <i class="fas fa-arrow-right ml-2"></i>
                </button>

                <!-- Submit Button -->
                <button 
                    x-show="$wire.currentStep === 3"
                    @click="alert('Form Submitted to Backend!')"
                    class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors transform hover:-translate-y-0.5">
                    Complete Registration <i class="fas fa-check ml-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>

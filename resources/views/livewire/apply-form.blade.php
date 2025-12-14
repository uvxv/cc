<div>
    <!-- 
        NOTE: In a real Livewire app, the x-data state here would be 
        handled by PHP properties ($currentStep), and x-on:click would be wire:click.
    -->
    <div x-data="{ 
        step: 1, 
        totalSteps: 3,
        formData: {
            name: '',
            email: '',
            role: 'developer',
            bio: '',
            terms: false
        },
        nextStep() {
            if (this.step < this.totalSteps) this.step++;
        },
        prevStep() {
            if (this.step > 1) this.step--;
        },
        isComplete(s) {
            return this.step > s;
        },
        isCurrent(s) {
            return this.step === s;
        }
    }" class="max-w-3xl w-full space-y-8">

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
                    <div class="absolute left-0 top-1/2 transform -translate-y-1/2 h-1 bg-indigo-600 transition-all duration-500 -z-0" :style="'width: ' + ((step - 1) / (totalSteps - 1) * 100) + '%'"></div>

                    <!-- Step 1 Indicator -->
                    <div class="relative z-10 bg-white p-1 rounded-full">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300 border-2"
                             :class="step >= 1 ? 'border-indigo-600 bg-indigo-600 text-white' : 'border-slate-300 bg-white text-slate-500'">
                            <span x-show="step > 1"><i class="fas fa-check"></i></span>
                            <span x-show="step <= 1">1</span>
                        </div>
                        <div class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 text-xs font-semibold whitespace-nowrap" :class="step >= 1 ? 'text-indigo-600' : 'text-slate-400'">Account</div>
                    </div>

                    <!-- Step 2 Indicator -->
                    <div class="relative z-10 bg-white p-1 rounded-full">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300 border-2"
                             :class="step >= 2 ? 'border-indigo-600 bg-indigo-600 text-white' : 'border-slate-300 bg-white text-slate-500'">
                            <span x-show="step > 2"><i class="fas fa-check"></i></span>
                            <span x-show="step <= 2">2</span>
                        </div>
                        <div class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 text-xs font-semibold whitespace-nowrap" :class="step >= 2 ? 'text-indigo-600' : 'text-slate-400'">Profile</div>
                    </div>

                    <!-- Step 3 Indicator -->
                    <div class="relative z-10 bg-white p-1 rounded-full">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold text-sm transition-colors duration-300 border-2"
                             :class="step >= 3 ? 'border-indigo-600 bg-indigo-600 text-white' : 'border-slate-300 bg-white text-slate-500'">
                            <span>3</span>
                        </div>
                        <div class="absolute -bottom-5 left-1/2 transform -translate-x-1/2 text-xs font-semibold whitespace-nowrap" :class="step >= 3 ? 'text-indigo-600' : 'text-slate-400'">Review</div>
                    </div>
                </div>
            </div>

            <!-- Form Body -->
            <div class="p-8">
                <form onsubmit="event.preventDefault();">
                    
                    <!-- Step 1 Content -->
                    <div x-show="step === 1" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Account Information</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Email Address</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="fas fa-envelope"></i></span>
                                    <input type="email" x-model="formData.email" class="pl-10 block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 transition shadow-sm" placeholder="you@example.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Password</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="pl-10 block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 transition shadow-sm" placeholder="••••••••">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Confirm Password</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-slate-400"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="pl-10 block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 transition shadow-sm" placeholder="••••••••">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2 Content -->
                    <div x-show="step === 2" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Personal Profile</h3>
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Full Name</label>
                                <input type="text" x-model="formData.name" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 shadow-sm" placeholder="John Doe">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Role</label>
                                <select x-model="formData.role" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 shadow-sm">
                                    <option value="developer">Developer</option>
                                    <option value="designer">Designer</option>
                                    <option value="manager">Manager</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-slate-700 mb-1">Short Bio</label>
                                <textarea x-model="formData.bio" rows="3" class="block w-full rounded-lg border-slate-300 bg-slate-50 border focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 shadow-sm" placeholder="Tell us about yourself..."></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3 Content -->
                    <div x-show="step === 3" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-x-4" x-transition:enter-end="opacity-100 translate-x-0">
                        <h3 class="text-xl font-bold text-slate-800 mb-4">Review Details</h3>
                        
                        <div class="bg-indigo-50 rounded-lg p-6 border border-indigo-100 mb-6">
                            <dl class="space-y-4">
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Email</dt>
                                    <dd class="text-sm font-semibold text-slate-900" x-text="formData.email || 'Not provided'"></dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Name</dt>
                                    <dd class="text-sm font-semibold text-slate-900" x-text="formData.name || 'Not provided'"></dd>
                                </div>
                                <div class="flex justify-between">
                                    <dt class="text-sm font-medium text-slate-500">Role</dt>
                                    <dd class="text-sm font-semibold text-slate-900 capitalize" x-text="formData.role"></dd>
                                </div>
                            </dl>
                        </div>

                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" type="checkbox" x-model="formData.terms" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-slate-300 rounded">
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
                    wire:click="prevStep" 
                    x-show="step > 1" 
                    class="inline-flex items-center px-4 py-2 border border-slate-300 shadow-sm text-sm font-medium rounded-lg text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    <i class="fas fa-arrow-left mr-2"></i> Back
                </button>
                <div x-show="step === 1"></div> <!-- Spacer -->

                <!-- Next Button -->
                <button 
                    wire:click="nextStep" 
                    x-show="step < 3"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                    Next Step <i class="fas fa-arrow-right ml-2"></i>
                </button>

                <!-- Submit Button -->
                <button 
                    x-show="step === 3"
                    @click="alert('Form Submitted to Backend!')"
                    class="inline-flex items-center px-6 py-2 border border-transparent text-sm font-medium rounded-lg shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors transform hover:-translate-y-0.5">
                    Complete Registration <i class="fas fa-check ml-2"></i>
                </button>
            </div>
        </div>
    </div>
</div>

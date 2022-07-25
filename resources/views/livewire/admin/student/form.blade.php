<div>
    <div>
        @include('admin.components.errors')
        <!--begin::Form-->
        <form class="form" wire:submit.prevent="{{ $method }}">
             <!--begin::Input group-->
             <div class="fv-row mb-7">
                <div
                    x-data="{ isUploading: false, progress: 0 }"
                    x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = false"
                    x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!--begin::Label-->
                    <label class="fs-6 fw-bold mb-2">
                        <span>Imagen</span>
                        <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Tipo de archivo permitido: png, jpg, jpeg. gif, .webp"></i>
                    </label>
                    <!--end::Label-->
                    <!--begin::Image input wrapper-->
                    <div class="mt-1">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline">
                            <!--begin::Preview existing avatar-->
                            <div 
                                class="image-input-wrapper w-125px h-125px" 
                                @if ($imageTmp)
                                    style="background-image: url('{{ $imageTmp->temporaryUrl() }}')"
                                @else
                                    style="background-image: url('{{ $student->imagePreview() }}')"
                                @endif
                            ></div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Edit-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow image-input" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Cambiar imagen">
                                <i class="bi bi-pencil-fill fs-7"></i>
                                <!--begin::Inputs-->
                                <input wire:model.defer="imageTmp" class="d-none" type="file" name="" accept=".png, .jpg, .jpeg, .gif, .webp" />
                                <!--end::Inputs-->
                            </label>
                            <!--end::Edit-->
                            @if ($imageTmp || $student->image)
                            <!--begin::Remove-->
                            <span wire:click.prevent="removeImage()" class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="">
                                <i class="bi bi-x fs-2"></i>
                            </span>
                            <!--end::Remove-->
                            @endif
                        </div>
                        <!--end::Image input-->
                    </div>
                    @error('imageTmp') <small  class="form-text text-danger" role="alert">{{ $message }}</small> @enderror            
                    <!-- Progress Bar -->
                    <div x-show="isUploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
                <!--end::Image input wrapper-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold form-label mb-2">
                    <span class="">Materias</span>
                </label>
                <select wire:model.defer="studentMattersArray" class="studentMattersArray-{{ $student->id }} form-select mb-2 @error('studentMattersArray') 'invalid-feedback' @enderror" data-control="select2" data-placeholder="Selecciona una opción" data-allow-clear="true" multiple="multiple">
                    <option value="">Selecciona una opción</option>
                    @foreach ($matters as $matter)
                        <option value="{{ $matter->id }}">{{ $matter->name }}</option>
                    @endforeach
                </select>
                <span class="badge badge-secondary">Opcional, en caso de que ya tengas a las materias a seleccionar para este estudiante</span>
                @error('studentMattersArray') <small  class="form-text text-danger" role="alert">{{ $message }}</small> @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold form-label mb-2">
                    <span class="required">Nombre</span>
                </label>
                <input type="text" required wire:model.defer="student.name" class="form-control form-control-solid @error('student.name') 'invalid-feedback' @enderror" placeholder="Ej: Español" name="" />
                @error('student.name') <small  class="form-text text-danger" role="alert">{{ $message }}</small> @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold form-label mb-2">
                    <span class="required">Apellidos</span>
                </label>
                <input type="text" required wire:model.defer="student.surname" class="form-control form-control-solid @error('student.surname') 'invalid-feedback' @enderror" placeholder="Ej: Español" name="" />
                @error('student.surname') <small  class="form-text text-danger" role="alert">{{ $message }}</small> @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold form-label mb-2">
                    <span class="required">Fecha de cumpleaños</span>
                </label>
                <input type="text" required wire:model.defer="student.date_birthday" class="dateBirthday-{{ $student->id }} form-control form-control-solid @error('student.date_birthday') 'invalid-feedback' @enderror" autocomplete="off" placeholder="Fecha de cumpleaños" name="" />
                @error('student.date_birthday') <small  class="form-text text-danger" role="alert">{{ $message }}</small> @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center pt-15">
                <button type="reset" class="btn btn-light me-3" data-bs-dismiss="modal"><i class="fa fa-arrow-left"></i></button>
                <button wire:loading.attr="disabled" wire:target="{{ $method }}" type="submit" class="btn btn-primary">
                    <span class="indicator-label">Guardar cambios</span>
                    <span wire:loading wire:target="{{ $method }}" class="spinner-border spinner-border-sm align-middle ms-2"></span>
                </button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    @push('footer')
        <script>
            $(document).ready(function(){
                $('.studentMattersArray-{{ $student->id }}').select2().on('change', function (e) {
                    let data = $(this).select2("val");
                    @this.set('studentMattersArray', data);
                });
                Livewire.on('renderJs', function(){
                    $('.studentMattersArray-{{ $student->id }}').select2();
                    $(".dateBirthday-{{ $student->id }}").flatpickr();
                });
                $(".dateBirthday-{{ $student->id }}").flatpickr();
            });
        </script>
    @endpush
</div>
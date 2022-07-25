<div>
    <div>
        @include('admin.components.errors')
        <!--begin::Form-->
        <form class="form" wire:submit.prevent="{{ $method }}">
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold form-label mb-2">
                    <span class="">Alumnos</span>
                </label>
                <select wire:model.defer="matterStudentsArray" class="matterStudentsArray form-select mb-2 @error('matterStudentsArray') 'invalid-feedback' @enderror" data-control="select2" data-placeholder="Selecciona una opción" data-allow-clear="true" multiple="multiple">
                    <option value="">Selecciona una opción</option>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
                <span class="badge badge-secondary">Opcional, en caso de que ya tengas a los alumnos a seleccionar para esta materia</span>
                @error('matterStudentsArray') <small  class="form-text text-danger" role="alert">{{ $message }}</small> @enderror
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
                <label class="fs-6 fw-bold form-label mb-2">
                    <span class="required">Nombre</span>
                </label>
                <input type="text" required wire:model.defer="matter.name" class="form-control form-control-solid @error('matter.name') 'invalid-feedback' @enderror" placeholder="Ej: Español" name="" />
                @error('matter.name') <small  class="form-text text-danger" role="alert">{{ $message }}</small> @enderror
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
                $('.matterStudentsArray').select2().on('change', function (e) {
                    let data = $(this).select2("val");
                    @this.set('matterStudentsArray', data);
                });
                Livewire.on('renderJs', function(){
                    $('.matterStudentsArray').select2();
                });
            });
        </script>
    @endpush
</div>
@extends('adminlte::page')

{{-- titulo de la pagina --}}
{{-- @section('title', 'Categorias') --}}

@section('content_header')
    <div class="d-flex justify-content-between align-items-end mb-2">
        <h1 class="m-0 text-dark">Editar Producto</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent p-0 m-0">
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin') }}"><i class="fas fa-home"></i> Inicio</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/admin/productos') }}">Producto</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Editar</li>
            </ol>
        </nav>
    </div>
    <hr>
@stop

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-gradient-success">
                    <h3 class="card-title text-white m-0">
                        <i class="fas fa-edit mr-2"></i> <b>Editar registro</b>
                    </h3>
                </div>
                <div class="card-body table-responsive">
                    <form action="{{ url('/admin/productos/'. $producto->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col col-12 col-md-7 col-lg-8">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            {{-- Categoria --}}
                                            <label for="nombre">Categoria <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-tags"></i></span>
                                                </div>
                                                <select name="categoria_id" id="categoria_id" class="form-control" required>
                                                    <option value="">Seleccione una opción</option>
                                                    @foreach($categorias as $categoria)
                                                        <option 
                                                            value="{{ $categoria->id }}" 
                                                            {{ old('categoria_id', $producto->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                                            {{ $categoria->nombre }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('nombre')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                            {{-- Codigo --}}
                                            <label for="codigo">Codigo <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-barcode"></i></span>
                                                </div>
                                                <input type="text" value="{{ old('codigo', $producto->codigo) }}" class="form-control" id="codigo" name="codigo" placeholder="Ingrese la codigo del producto" required>
                                            </div>
                                            @error('codigo')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                            {{-- Nombre --}}
                                            <label for="nombre">Nombre <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-box"></i></span>
                                                </div>
                                                <input type="text" value="{{ old('nombre', $producto->nombre) }}" class="form-control" id="nombre" name="nombre" placeholder="Ingrese la nombre del producto" required>
                                            </div>
                                            @error('nombre')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            {{-- Descripcion --}}
                                            <label for="descripcion">Descripcion <span class="text-danger">*</span></label>
                                            <div class="editor-wrapper">
                                                <textarea id="descripcion" name="descripcion">{{ old('descripcion', $producto->descripcion) }}</textarea>
                                            </div>
                                            @error('descripcion')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                            {{-- Precio Compra --}}
                                            <label for="precio_compra">Precio Compra <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                                </div>
                                                <input style="text-align: center" type="number" value="{{ old('precio_compra', $producto->precio_compra) }}" class="form-control" id="precio_compra" name="precio_compra" required>
                                            </div>
                                            @error('precio_compra')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                            {{-- Precio Venta --}}
                                            <label for="precio_venta">Precio Venta <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                                </div>
                                                <input style="text-align: center" type="number" value="{{ old('precio_venta', $producto->precio_venta) }}" class="form-control" id="precio_venta" name="precio_venta" required>
                                            </div>
                                            @error('precio_venta')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                            {{-- Stock Minimo  --}}
                                            <label for="stock_minimo">Stock Minimo <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-down"></i></span>
                                                </div>
                                                <input style="text-align: center" type="number" value="{{ old('stock_minimo', $producto->stock_minimo) }}" class="form-control" id="stock_minimo" name="stock_minimo" required>
                                            </div>
                                            @error('stock_minimo')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                            {{-- Stock Maximo  --}}
                                            <label for="stock_maximo">Stock Maximo <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-arrow-up"></i></span>
                                                </div>
                                                <input style="text-align: center" type="number" value="{{ old('stock_maximo', $producto->stock_maximo) }}" class="form-control" id="stock_maximo" name="stock_maximo" required>
                                            </div>
                                            @error('stock_maximo')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                            {{-- Unidad Medida  --}}
                                            <label for="unidad_medida">Unidad Medida <span class="text-danger">*</span></label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fas fa-balance-scale"></i></span>
                                                </div>
                                                <select name="unidad_medida" id="unidad_medida" class="form-control" required>
                                                    <option value="">Seleccione una opción</option>
                                                    <option value="unidad" {{ $producto->unidad_medida == 'unidad' ? 'selected' : '' }}>Unidad</option>
                                                    <option value="kg" {{ $producto->unidad_medida == 'kg' ? 'selected' : '' }}>Kg</option>
                                                    <option value="g" {{ $producto->unidad_medida == 'g' ? 'selected' : '' }}>g</option>
                                                    <option value="l" {{ $producto->unidad_medida == 'l' ? 'selected' : '' }}>l</option>
                                                    <option value="ml" {{ $producto->unidad_medida == 'ml' ? 'selected' : '' }}>ml</option>
                                                </select>
                                            </div>
                                            @error('unidad_medida')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col col-6 col-md-4">
                                        <div class="form-group">
                                             {{-- Estado un checkbox --}}
                                            <label class="form-check-label" for="estado"><b>Estado</b></label>
                                            <div class="form-check form-check-inline">
                                                <!-- Truco: valor por defecto si no se marca -->
                                                <input type="hidden" name="estado" value="0">

                                                <!-- Checkbox -->
                                                <input class="form-check-input" type="checkbox" id="estado" name="estado" value="1"
                                                    {{ old('estado', $producto->estado) ? 'checked' : '' }}>
                                            </div>
                                            @error('estado')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-12 col-md-5 col-lg-4">
                                <div class="form-group">
                                    {{-- Imagen del Producto  --}}
                                    <label for="imagen">Imagen del Producto </label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-image"></i></span>
                                        </div>
                                        <input style="text-align: center" type="file" class="form-control" id="imagen" name="imagen" accept="image/*" onchange="preview(event)">
                                    </div>
                                    <div style="display: flex; justify-content: center; align-items: center; margin: 20px;">
                                        <img id="imgPreview" style="width: 100%;" src="{{ asset('storage/'. $producto->imagen ) }}" alt="{{ $producto->nombre }}">
                                    </div>
                                    <script>
                                        function preview(e) {
                                            const input = e.target;
                                            const file = input.files[0];
                                            if (file) {
                                                const reader = new FileReader();
                                                reader.onload = function (e) {
                                                    const imgPreview = document.getElementById('imgPreview');
                                                    imgPreview.src = e.target.result;
                                                    imgPreview.style.display = 'block';
                                                };
                                                reader.readAsDataURL(file);
                                            }
                                        }
                                    </script>
                                    @error('imagen')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-6 mb-2">
                                <a href="{{ url('/admin/productos') }}" class="btn btn-outline-secondary btn-block">
                                    <i class="fas fa-times"></i> Cancelar
                                </a>
                            </div>
                            <div class="col-12 col-sm-6">
                                <button type="submit" class="btn btn-outline-success btn-block">
                                    <i class="fas fa-edit"></i> Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
<style>
   .ck.ck-editor {
       width: 100% !important;
   }
   
   .ck-editor__editable {
       width: 100% !important;
       min-height: 300px;
       box-sizing: border-box;
   }
   
   .ck.ck-toolbar {
       flex-wrap: wrap;
   }
   
   @media (max-width: 768px) {
       .ck-editor__editable {
           min-height: 250px;
           padding: 10px;
       }
   }
</style>
@stop

@section('js')
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
   ClassicEditor
       .create(document.querySelector('#descripcion'), {
           toolbar: {
               items: [
                   'heading', '|',
                   'bold', 'italic', 'underline', 'strikethrough', 'subscript', 'superscript', '|',
                   'link', 'bulletedList', 'numberedList', '|',
                   'outdent', 'indent', '|',
                   'alignment', '|',
                   'blockQuote', 'insertTable', 'mediaEmbed', '|',
                   'undo', 'redo', '|',
                   'fontBackgroundColor', 'fontColor', 'fontSize', 'fontFamily', '|',
                   'code', 'codeBlock', 'htmlEmbed', '|',
                   'sourceEditing'
               ],
               shouldNotGroupWhenFull: true
           },
           language: 'es'
       })
       .then(editor => {
           // Forzar responsive después de crear el editor
           const editorEl = editor.ui.view.element;
           editorEl.style.width = '100%';
           editorEl.querySelector('.ck-editor__editable').style.width = '100%';
       })
       .catch(error => {
           console.error(error);
       });
</script>
@stop
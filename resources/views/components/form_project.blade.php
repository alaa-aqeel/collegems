
<div class="form-group">
    <input name="name" value='@isset($name) {{ $name }} @endisset' class="form-control sty @error('name') is-invalid @enderror" placeholder="Name Project" @isset($required) required @endisset>
    @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>

<div class="form-group">
    <textarea name='description' 
    class="form-control @error('description') is-invalid @enderror"  placeholder="Decription" rows="5" @isset($required) required @endisset
    >@isset($description) {{ $description }} @endisset</textarea>
    @error('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>

<div class="form-group">
    <span class="input-icons"> 
        <i class="fa fa-link"></i>
    </span>
    <input value='@isset($link) {{ $link }} @endisset' type="text" name='link' class="form-control sty @error('link') is-invalid @enderror" placeholder="Link Github" style="padding-left: 30px" @isset($required) required @endisset>
    @error('link')
        <div class="invalid-feedback">
            {{$message}}
        </div>
    @enderror
</div>

<div class="form-group">
    <div class="form-group">
        <div class="custom-file">
            <input name='image' type="file" class="custom-file-input" id="customFileLang" lang="en" @isset($required) required @endisset>
            <label class="custom-file-label" for="customFileLang"> Upload file</label>
            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
    </div>
</div>
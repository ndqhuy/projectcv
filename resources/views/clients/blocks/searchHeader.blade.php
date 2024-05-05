<form action="{{ route('searchNav') }}" method="get" class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
            <input type="text" class="form-control" name="keyword" aria-label="Text input with dropdown button"
                placeholder="Vị trí tuyển dụng">

            <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="area">
                <option selected><i class="fa-solid fa-location-dot"></i><span>Tỉnh / Thành phố</span></option>
                @foreach ($careers as $career)
                    <option value="{{ $career->career_id }}">{{ $career->career_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-2">
        <select class="form-select form-select-lg" aria-label=".form-select-lg example" name="career_id">
            <option selected>Lĩnh vực</option>
            @foreach ($careers as $career)
                <option value="{{ $career->career_id }}">{{ $career->career_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-2">
        <select class="form-select form-select-lg" aria-label=".form-select-lg example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
    </div>
    <div class="col-2 p-1">
        <button type="submit" class="btn btn-primary">Tìm kiếm</button>
    </div>
</form>

<form action="?" method="get">
    <div class="row">
        <div class="col-sm-1">
            <div class="form-group">
                <label for="filter-uid" class="col-form-label">id</label>
                <input id="filter-uid" class="form-control" name="id" value="{{request('id')}}">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <label for="filter-email" class="col-form-label">email</label>
                <input id="filter-email" class="form-control" name="email" value="{{request('email')}}">
            </div>
        </div>

        <div class="col-sm-2">
            <div class="form-group">
                <label for="filter-uname" class="col-form-label">name</label>
                <input id="filter-uname" class="form-control" name="name" value="{{request('name')}}">
            </div>
        </div>

        <div class="col-sm-2">
            <label for="filter-ustatus" class="col-form-label">status</label>
            <select id="filter-ustatus" class="form-control" name="status" value="{{request('status')}}">
                <option></option>
                @foreach ($statuses as $value => $label )
                    <option value="{{$value}}" {{($value === request('status'))? 'selected' : '' }}>{{$label}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-2">
            <label for="filter-urole" class="col-form-label">role</label>
            <select id="filter-urole" class="form-control" name="role" value="{{request('role')}}">
                <option></option>
                @foreach ($roles as $value => $label )
                    <option value="{{$value}}" {{($value === request('role'))? 'selected' : '' }}>{{$label}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-1">
            <div class="form-group">
                <label class="col-form-label">&nbsp;</label><br />
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </div>

    </form>

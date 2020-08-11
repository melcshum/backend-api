@csrf

<div class="form-group">
    <label for="knowledge-name">Name</label>
    <input type="text" name="name" value="{{ old('name', $knowledgeComponent->name) }}" id="knowledge-name"
        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}">

    @if ($errors->has('name'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </div>
    @endif
</div>

<div class="form-group">
    <label for="knowledge-purpose">Purpose</label>
    <textarea name="purpose" id="knowledge-purpose" rows="10"
        class="form-control {{ $errors->has('purpose') ? 'is-invalid' : '' }}">{{ old('purpose', $knowledgeComponent->purpose) }}</textarea>

    @if ($errors->has('purpose'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('purpose') }}</strong>
        </div>
    @endif
</div>

<div class="form-group">
    <label for="knowledge-level">Level</label>
    <input type="number" name="level" value="{{ old('level', $knowledgeComponent->level) }}" id="knowledge-level"
        class="form-control {{ $errors->has('level') ? 'is-invalid' : '' }}">

    @if ($errors->has('level'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('level') }}</strong>
        </div>
    @endif
</div>

<div class="form-group">
    <button type="submit" class="btn btn-outline-primary btn-lg">{{ $buttonText }}</button>
</div>

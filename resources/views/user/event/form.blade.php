<div class="form-group">
    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" value="{{ isset($event)?$event->title:old('title') }}">
</div>
<div class="form-group">
    <label for="location">Location</label>
    <input type="text" name="location" class="form-control" value="{{ isset($event)?$event->location:old('location') }}">
</div>
<div class="form-group">
    <label for="Event Date">Event Date</label>
    <input type="text" name="event_date" id="datepicker" class="form-control" value="{{ isset($event)?date('Y-m-d',strtotime($event->event_date)):old('event_date') }}">
</div>
<div class="form-group">
    <label for="description">Description</label>
    <textarea name="description" class="form-control">
        {!! isset($event)?$event->description:old('description') !!}
    </textarea>
</div>
<div class="form-group">
    <label for="title">Image</label>
    <input type="file" name="image" class="form-control">
    @if(isset($event) && $event->image)
        <img src="{{ $event->get_image() }}" alt="{{ $event->title }}" style="width: 400px;">
    @endif
</div>
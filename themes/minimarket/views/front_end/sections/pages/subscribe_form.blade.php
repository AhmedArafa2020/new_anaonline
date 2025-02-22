<form class="subscribe-form" action='{{ route("newsletter.store",$slug) }}' method="post">
    @csrf
    <div class="form-inputs">
        <input type="email" placeholder="Type your email address..." class="form-control border-radius-50" name="email">
        <button type="submit" class="btn">
        {!! $section->subscribe->section->button->text ?? 'Subscribe' !!}
        </button>
    </div>
    <div class="checkbox-custom">
		<input type="checkbox" class="" id="subsection">
		    <label for="subscribecheck" id="{{ $section->subscribe->section->sub_title->slug ?? '' }}_preview">
		        {!! $section->subscribe->section->sub_title->text ?? '' !!}
		    </label>
	    </div>
</form>

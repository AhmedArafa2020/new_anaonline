<form class="footer-subscribe-form" action="{{ route('newsletter.store',$slug) }}" method="post" class="subscribe-form">
    @csrf
    <div class="input-wrapper">
        <input type="email" placeholder="TYPE YOUR EMAIL ADDRESS..." name="email">
        <button type="submit" class="btn-subscibe">{{ __('SUBSCRIBE') }}
        </button>
    </div>
    <div class="checkbox-custom">
        <input type="checkbox" id="subscibecheck">
        <label for="subscibecheck" id="{{ $section->subscribe->section->sub_title->slug ?? '' }}_preview">
            {!! $section->subscribe->section->sub_title->text ?? '' !!}
        </label>
    </div>
</form>
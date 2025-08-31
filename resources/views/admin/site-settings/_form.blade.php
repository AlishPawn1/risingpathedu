<ul class="nav nav-tabs mb-4" id="siteSettingsTabs" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link text-black active " id="site-tab" data-bs-toggle="tab" data-bs-target="#site" type="button" role="tab">Site Info</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link text-black" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact Info</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link text-black" id="seo-tab" data-bs-toggle="tab" data-bs-target="#seo" type="button" role="tab">SEO / Meta</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link text-black" id="social-tab" data-bs-toggle="tab" data-bs-target="#social" type="button" role="tab">Social Links</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link text-black" id="extra-tab" data-bs-toggle="tab" data-bs-target="#extra" type="button" role="tab">Extra</button>
    </li>
</ul>

<div class="tab-content" id="siteSettingsTabsContent">
    <!-- Site Info -->
    <div class="tab-pane fade show active" id="site" role="tabpanel">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Site Name</label>
                <input type="text" name="site_name" class="form-control @error('site_name') is-invalid @enderror"
                    value="{{ old('site_name', $setting->site_name ?? '') }}">
                @error('site_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>

            <div class="col-md-6">
                <label class="form-label">Site Logo</label>
                <input type="file" name="site_logo" class="form-control @error('site_logo') is-invalid @enderror" accept="image/*">
                @error('site_logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @if(!empty($setting->site_logo))
                    <img src="{{ asset('storage/'.$setting->site_logo) }}" class="img-thumbnail mt-2" style="width:100px;height:100px;object-fit:contain;">
                @endif
            </div>

            <div class="col-md-6">
                <label class="form-label">Footer Logo</label>
                <input type="file" name="footer_logo" class="form-control @error('footer_logo') is-invalid @enderror" accept="image/*">
                @error('footer_logo')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @if(!empty($setting->footer_logo))
                    <img src="{{ asset('storage/'.$setting->footer_logo) }}" class="img-thumbnail mt-2" style="width:100px;height:100px;object-fit:contain;">
                @endif
            </div>

            <div class="col-md-6">
                <label class="form-label">Favicon</label>
                <input type="file" name="favicon" class="form-control @error('favicon') is-invalid @enderror" accept="image/*">
                @error('favicon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                @if(!empty($setting->favicon))
                    <img src="{{ asset('storage/'.$setting->favicon) }}" class="img-thumbnail mt-2" style="width:50px;height:50px;object-fit:contain;">
                @endif
            </div>
        </div>
    </div>

    <!-- Contact Info -->
    <div class="tab-pane fade" id="contact" role="tabpanel">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $setting->email ?? '') }}">
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="col-md-6">
                <label class="form-label">Secondary Email</label>
                <input type="email" name="secondary_email" class="form-control"
                    value="{{ old('secondary_email', $setting->secondary_email ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Contact Number</label>
                <input type="text" name="contact_number" class="form-control"
                    value="{{ old('contact_number', $setting->contact_number ?? '') }}">
            </div>
            <div class="col-md-6">
                <label class="form-label">Secondary Contact Number</label>
                <input type="text" name="secondary_contact_number" class="form-control"
                    value="{{ old('secondary_contact_number', $setting->secondary_contact_number ?? '') }}">
            </div>
            <div class="col-12">
                <label class="form-label">Location</label>
                <input type="text" name="location" class="form-control"
                    value="{{ old('location', $setting->location ?? '') }}">
            </div>
            <div class="col-12">
                <label class="form-label">Map Embed</label>
                <textarea name="map_embed" rows="3" class="form-control">{{ old('map_embed', $setting->map_embed ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <!-- SEO / Meta -->
    <div class="tab-pane fade" id="seo" role="tabpanel">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Meta Title</label>
                <input type="text" name="meta_title" class="form-control"
                    value="{{ old('meta_title', $setting->meta_title ?? '') }}">
            </div>
            <div class="col-12">
                <label class="form-label">Meta Description</label>
                <textarea name="meta_description" rows="3" class="form-control">{{ old('meta_description', $setting->meta_description ?? '') }}</textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Meta Keywords</label>
                <textarea name="meta_keywords" rows="3" class="form-control">{{ old('meta_keywords', $setting->meta_keywords ?? '') }}</textarea>
            </div>
        </div>
    </div>

    <!-- Social Links -->
    <div class="tab-pane fade" id="social" role="tabpanel">
        <div class="row g-4">
            <div class="col-md-6"><label class="form-label">Facebook</label><input type="url" name="facebook" class="form-control" value="{{ old('facebook', $setting->facebook ?? '') }}"></div>
            <div class="col-md-6"><label class="form-label">Twitter</label><input type="url" name="twitter" class="form-control" value="{{ old('twitter', $setting->twitter ?? '') }}"></div>
            <div class="col-md-6"><label class="form-label">Instagram</label><input type="url" name="instagram" class="form-control" value="{{ old('instagram', $setting->instagram ?? '') }}"></div>
            <div class="col-md-6"><label class="form-label">LinkedIn</label><input type="url" name="linkedin" class="form-control" value="{{ old('linkedin', $setting->linkedin ?? '') }}"></div>
            <div class="col-md-6"><label class="form-label">YouTube</label><input type="url" name="youtube" class="form-control" value="{{ old('youtube', $setting->youtube ?? '') }}"></div>
        </div>
    </div>

    <!-- Extra -->
    <div class="tab-pane fade" id="extra" role="tabpanel">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Business Hours</label>
                <input type="text" name="business_hours" class="form-control"
                    value="{{ old('business_hours', $setting->business_hours ?? '') }}">
            </div>
            <div class="col-12">
                <label class="form-label">Footer Text</label>
                <textarea name="footer_text" rows="3" class="form-control">{{ old('footer_text', $setting->footer_text ?? '') }}</textarea>
            </div>
        </div>
    </div>
</div>

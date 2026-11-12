<thead>
    <th style="width: 10%">#</th>
    <th>Image</th>
    <th style="width: 55%">Title & Subtitle</th>
    {{-- <th>Content</th> --}}
    {{-- <th>Button Text</th> --}}
    <th class="text-center">Is Active?</th>
</thead>

<tbody>
    @foreach ($sections as $section)
        <tr>
            <td>
                <input type="number" name="sections[{{ $section->id }}][order]"
                    value="{{ old('sections.' . $section->id . '.order', $section->order) }}" class="form-control"
                    readonly>
            </td>
            <td>
                <div class="form-group">
                    @if ($section->image)
                        <img src="{{ $section->image_url }}" class="img-thumbnail mt-2">
                    @endif
                    <input type="file" name="sections[{{ $section->id }}][image]"
                        class="form-control @error('sections.' . $section->id . '.image') is-invalid @enderror">
                    @error('sections.' . $section->id . '.image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </td>
            <td>
                <label class="fw-bold">Title:</label>
                <input type="text" name="sections[{{ $section->id }}][title]"
                    value="{{ old('sections.' . $section->id . '.title', $section->title) }}" class="form-control">

                <label class="fw-bold mt-2">Subtitle:</label>
                <input type="text" name="sections[{{ $section->id }}][subtitle]"
                    value="{{ old('sections.' . $section->id . '.subtitle', $section->subtitle) }}"
                    class="form-control">
            </td>
            {{-- <td>
                <textarea name="sections[{{ $section->id }}][content]" class="form-control">{{ old('sections.' . $section->id . '.content', $section->content) }}</textarea>
            </td> --}}
            {{-- <td>
                <input type="text" name="sections[{{ $section->id }}][button_text]"
                    value="{{ old('sections.' . $section->id . '.button_text', $section->button_text) }}"
                    class="form-control">
            </td> --}}
            <td class="text-center">
                <input type="checkbox" name="sections[{{ $section->id }}][is_active]" value="1"
                    {{ $section->is_active ? 'checked' : '' }}>
            </td>
        </tr>
    @endforeach
</tbody>

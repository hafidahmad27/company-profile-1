<thead>
    {{-- <th>Order</th> --}}
    <th>Subtitle</th>
    {{-- <th>Content</th> --}}
    {{-- <th>Image</th> --}}
    {{-- <th class="text-center">Is Active?</th> --}}
</thead>

<tbody>
    @foreach ($sections as $section)
        <tr>
            {{-- <td>
                <input type="number" name="sections[{{ $section->id }}][order]"
                    value="{{ old('sections.' . $section->id . '.order', $section->order) }}" class="form-control">
            </td>             --}}
            <td>
                <input type="text" name="sections[{{ $section->id }}][subtitle]"
                    value="{{ old('sections.' . $section->id . '.subtitle', $section->subtitle) }}" class="form-control">
            </td>
            {{-- <td>
                <textarea name="sections[{{ $section->id }}][content]" class="form-control">{{ old('sections.' . $section->id . '.content', $section->content) }}</textarea>
            </td> --}}
            {{-- <td>
                <div class="d-flex align-items-center gap-3">
                    @if ($section->image)
                        <img src="{{ $section->image_url }}" width="80" class="mt-2">
                    @endif
                    <input type="file" name="sections[{{ $section->id }}][image]"
                        class="form-control @error('sections.' . $section->id . '.image') is-invalid @enderror">
                    @error('sections.' . $section->id . '.image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </td> --}}
            {{-- <td class="text-center"> --}}
            <input type="hidden" name="sections[{{ $section->id }}][is_active]" value="1"
                {{ $section->is_active ? 'checked' : '' }}>
            {{-- </td> --}}
        </tr>
    @endforeach
</tbody>

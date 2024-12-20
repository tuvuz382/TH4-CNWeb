<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<title>Update Issue</title>
</head>
<body>

<h1 style="margin: 50px 50px">Cập nhật thông tin Issue</h1>

<form action="{{ route('issues.update', $issues->id) }}" method="POST" style="margin: 50px 50px">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="computer_id">Máy tính</label>
        <select name="computer_id" class="form-control" required>
            @foreach($computers as $computer)
            <option value="{{ $computer->id }}" {{ $computer->id == $issues->computer_id ? 'selected' : '' }}>
                {{ $computer->computer_name }}
            </option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="reported_by">Người báo cáo</label>
        <input type="text" name="reported_by" class="form-control" value="{{ $issues->reported_by }}" required>
    </div>
    <div class="form-group">
        <label for="urgency">Mức độ nghiêm trọng</label>
        <select name="urgency" class="form-control" required>
            <option value="Low" {{ $issues->urgency == 'Low' ? 'selected' : '' }}>Low</option>
            <option value="Medium" {{ $issues->urgency == 'Medium' ? 'selected' : '' }}>Medium</option>
            <option value="High" {{ $issues->urgency == 'High' ? 'selected' : '' }}>High</option>
        </select>
    </div>
    <div class="form-group">
        <label for="status">Trạng thái</label>
        <select name="status" class="form-control" required>
            <option value="Open" {{ $issues->status == 'Open' ? 'selected' : '' }}>Open</option>
            <option value="In Progress" {{ $issues->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Resolved" {{ $issues->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
        </select>
    </div>
    <div class="form-group">
        <label for="reported_date">Ngày báo cáo</label>
        <input type="date" name="reported_date" class="form-control" value="{{ $issues->reported_date }}" required>
    </div>
    <div class="form-group">
        <label for="description">Mô tả chi tiết</label>
        <textarea name="description" class="form-control" rows="3" required>{{ $issues->description }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

</body>
</html>

<div class="form-group">
    <label>Task</label>
    <input type="text" name="task" class="form-control" value="{{ old('task', $task->task ?? null) }}"
        />
</div>

<div class="form-group">
    <label>Priority</label>

    <div>
        @foreach ($tt as $tt)            
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tier_task_id" id="tier_task_id" value={{ $tt->id }}>
                <label class="form-check-label" for="inlineRadio1">{{ $tt->desc }}</label>
              </div>
        @endforeach
    </div>
    
    {{--  <input type="text" name="tiertask_id" class="form-control"
        />  --}}
</div>

    @foreach ($errors->all() as $error)
        <li class="list-group-item list-group-item-danger mb-1">
            {{ $error }}
        </li>
    @endforeach
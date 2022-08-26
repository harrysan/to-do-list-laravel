<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col">
        <div class="card rounded-3">
          <div class="card-body">

            <h4 class="text-center my-3 pb-3">Complete</h4>

            <table class="table mb-4">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Todo item</th>
                  <th scope="col">Priority</th>
                  <th scope="col">Complete</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $i = 1
                @endphp
                @foreach ($taskcomplete as $task)
                    <tr>
                    <th scope="row">{{ $i++ }}</th>
                    <td>{{ $task->task }}</td>
                    <td>{{ $task->desc }}</td>
                    <td>
                        {{ $task->updated_at }}
                    </td>
                    </tr>
                @endforeach
              </tbody>
            </table>

          </div>
        </div>
      </div>
    </div>
  </div>
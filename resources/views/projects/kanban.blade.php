@extends('template-wpadmin')
@section('navbar_menu_project', 'active')
@section('main')
    <h1>Project Trello Style</h1>
    <div class="row">
        <div class="col-md-4">
            <h3>To Do</h3>
            <div class="kanban-column" id="todo">
                @foreach ($features['to_do'] as $feature)
                    <div class="kanban-item" data-id="{{ $feature['id'] }}">
                        {{ $feature['feature'] }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <h3>Progress</h3>
            <div class="kanban-column" id="progress">
                @foreach ($features['progress'] as $feature)
                    <div class="kanban-item" data-id="{{ $feature['id'] }}">
                        {{ $feature['feature'] }}
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <h3>Done</h3>
            <div class="kanban-column" id="done">
                @foreach ($features['done'] as $feature)
                    <div class="kanban-item" data-id="{{ $feature['id'] }}">
                        {{ $feature['feature'] }}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let columns = document.querySelectorAll(".kanban-column");

            columns.forEach(column => {
                column.addEventListener("dragover", function(e) {
                    e.preventDefault();
                });

                column.addEventListener("drop", function(e) {
                    e.preventDefault();
                    let itemId = e.dataTransfer.getData("text");
                    let item = document.querySelector(`[data-id='${itemId}']`);
                    column.appendChild(item);
                    updateStatus(itemId, column.id);
                });
            });

            document.querySelectorAll(".kanban-item").forEach(item => {
                item.setAttribute("draggable", true);
                item.addEventListener("dragstart", function(e) {
                    e.dataTransfer.setData("text", item.dataset.id);
                });
            });

            function updateStatus(itemId, newStatus) {
                fetch(`/projects/{{ $project->id }}/update-json`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        json: updateJsonData(itemId, newStatus)
                    })
                })
                .then(response => response.json())
                .then(data => console.log(data));
            }

            function updateJsonData(itemId, newStatus) {
                if(newStatus == 'todo') {
                    newStatus = 0;
                }
                else if(newStatus == 'progress') {
                    newStatus = 1;
                }
                else if(newStatus == 'done') {
                    newStatus = 2;
                }
                let features = @json($project->json);
                
                for (let i = 0; i < features.length; i++) {
                    if (features[i].id == itemId) {
                        features[i].status = newStatus;
                    }
                }
                return features;
            }
        });
    </script>

    <style>
        .kanban-column {
            min-height: 200px;
            border: 1px solid #ccc;
            padding: 10px;
            background-color: #f8f9fa;
        }
        .kanban-item {
            padding: 10px;
            background-color: white;
            margin-bottom: 5px;
            border: 1px solid #ddd;
            cursor: grab;
        }
    </style>
@endsection

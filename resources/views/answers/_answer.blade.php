<answer answer="{{ $answer }}" inline-template>
<div class="media post">
    <vote :model="{{ $answer }}" :name="answer"></vote>
    <div class="media-body"> 
    <form v-if="editing" @submit.prevent="update">
        <div class="form-group">
            <textarea rows="10" v-model="body" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary" :disabled="isInvalid">Update</button>
        <button @click="cancel" type="button" class="btn btn-outline-secondary">Cancel</button>
    </form>
      <div v-else>
        <div v-html="bodyHtml"></div>
        <div class="row">
            <div class="col-4">
                <div class="ml-auto">
                    @if($question)
                    @if (Auth::user()->can("update", $answer))
                        <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                    @endif
                    <!-- @can("update", $question)
                        <a href="{{ route('questions.edit', $question->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
                    @endcan -->
                    @if (Auth::user()->can("delete", $answer))                                     
                        <button  class="btn btn-sm btn-outline-danger" onclick="destroy">Delete</button>
                    @endif
                    @endif
                </div>
            </div>
            <div class="col-4"></div>
            <div class="col-4 mt-4">
                <!-- <span class="text-muted mt-4">Answered {{ $answer->created_date }}<span>
                <div class="media mt-4">
                    <a href="{{ $answer->user->url }}" class="pr-2">
                        <img src="{{ $answer->user->avatar }}" />
                    </a>
                    <div class="media-body mt-1">
                        <a href="{{ $answer->user->url }}">
                            {{ $answer->user->name }}
                        </a> 
                    </div>
                </div> -->
                <user-info :model="{{ $answer }}" label="Answered"></user-info>
            </div>
        </div>
      </div>
    </div>
</div>
</answer>
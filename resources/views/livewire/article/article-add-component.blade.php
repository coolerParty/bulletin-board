<div>
    <div class="container">
        <form classs="w-full" wire:submit.prevent="store">
            <div class="flex flex-wrap -mx-3 mb-6">
              <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="title">
                  title
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="title" type="text" placeholder="Jane" wire:model.lazy="title">
                @error('title')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
              </div>
            </div>
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
                  content
                </label>
                <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210" wire:model.lazy="content"></textarea>
                @error('content')<p class="text-xs italic text-red-500">{{ $message }}</p>@enderror
              </div>
            </div>
            <button type="submit" value="submit" >Post</button>
          </form>
    </div>
</div>

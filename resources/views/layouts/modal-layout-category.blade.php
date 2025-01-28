<div id="modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 items-center justify-center">
    <div class="bg-white p-4 rounded-md w-full md:w-[40rem]">
        <form id="myForm">
            <fieldset class="flex justify-between mt-2 mb-8">
                <div>
                    <span class="border-2 border-blue-900 rounded-sm text-sm p-1 font-bold text-blue-900">
                        <i class="fa fa-pen mr-1"></i>
                        Edit Class Category Details
                    </span>
                </div>
                <div>
                    <button id="closeModal" 
                    class="">
                       <i class="fa fa-times"></i>
                    </button>
                </div>
            </fieldset>
            <div class="md:flex my-2">
                <div class="w-full md:w-1/3">
                    <label class="text-sm" for="editCategory">Category: <span
                            class="text-xs text-red-500">*</span></label>
                </div>
                <div class="w-full md:w-2/3">
                    <input type="text" id="editCategory" name="category"
                        placeholder="eg: High School (5 - 10)" value="{{ old('category') }}"
                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm" required>
                </div>
            </div>
            <div class="md:flex my-2">
                <div class="w-full md:w-1/3">
                    <label class="text-sm" for="editSlug">Category Slug: <span
                            class="text-xs text-red-500">*</span></label>
                </div>
                <div class="w-full md:w-2/3">
                    <input type="text" id="editSlug" name="slug"
                        placeholder="category-one"
                        value="{{ old('slug') }}"
                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm" required>
                    <small class="text-red-500">Slug should be lowercase words seperated by dash( - ).</small>
                </div>
            </div>
            <div class="md:flex my-2">
                <div class="w-full md:w-1/3">
                    <label class="text-sm" for="editTitle">Category Title: <span
                            class="text-xs text-red-500">*</span></label>
                </div>
                <div class="w-full md:w-2/3">
                    <input type="text" id="editTitle" name="title"
                        placeholder="Explore the best and effordable content for this category"
                        value="{{ old('title') }}"
                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm">
                </div>
            </div>
            <div class="md:flex my-2">
                <div class="w-full md:w-1/3">
                    <label class="text-sm" for="editDescription">Category Description:</label>
                </div>
                <div class="w-full md:w-2/3">
                    <textarea rows="4" id="editDescription" name="description"
                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm"
                        placeholder="Write any description if needed..."></textarea>
                </div>
            </div>
            <div class="md:flex my-2">
                <div class="w-full md:w-1/3">
                    <label class="text-sm" for="editTags">Related Tags: <span
                            class="text-xs text-red-500">*</span></label>
                </div>
                <div class="w-full md:w-2/3">
                    <input type="text" id="editTags" name="tags"
                        placeholder="NCERT, Assamese, Class10"
                        class="w-full border border-blue-300 rounded-sm outline-none p-1 text-sm">
                    <small class="text-red-500">Tags should be single words seperated by comma(csv).</small>
                </div>
            </div>
            <div class="flex justify-end">
                <button
                    class="border border-blue-300 text-blue-950 bg-blue-200 px-2 py-1 rounded-sm text-sm font-bold"
                    type="button" id="submitBtn">
                    <i class="fa fa-save mr-1"></i>
                    Save
                </button>
            </div>
        </form>
        
    </div>
</div>

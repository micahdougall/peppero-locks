<div class="flex flex-col max-h-96">
    <div class="overflow-hidden hover:overflow-y-scroll overscroll-contain pr-6 pl-2 py-2">
        <div class="align-middle inline-block min-w-full">
            <div class="shadow overflow border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">

                    {{ $slot }}

                </table>
            </div>
        </div>
    </div>
</div>

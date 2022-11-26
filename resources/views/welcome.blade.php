<x-layout>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <a href="{{ route('users.index') }}"
                           class="underline text-gray-900 dark:text-white"
                        >Users</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        Manage Users.
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="flex items-center">
                    <div class="ml-4 text-lg leading-7 font-semibold">
                        <a href="{{ route('zones.index') }}"
                           class="underline text-gray-900 dark:text-white"
                        >Zones</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                        JS.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <h1>TODO:</h1>
        <ul>
{{--            <li>Remove password from edit user</li>--}}
{{--            <li>User to only see their zones and doors</li>--}}
            <li>Reshape bar on top</li>
            <li>Visibility of options for user v admin</li>
            <li>Password resets</li>
            <li>Mail intercept</li>
            <li>Read slides</li>
            <li>Read coursework brief</li>
            <li>Compare with Randell's version</li>
            <li>Logout via user avatar</li>
            <li>Add readme</li>
            <li>Test thoroughly</li>
            <li>Home page</li>
            <li>Back button from user/zone/door</li>
            <li>Move Admin button User</li>
            <li>More info on summary card</li>
            <li>Add all permutations to seeder</li>
            <li>door or zone button to filter on that zone</li>
            <li>Drill down on zone</li>
            <li>Drill down on door</li>
            <li>Check if deleting zone should delete door</li>
            <li>Update messages</li>
            <li>Change footer and header</li>
            <li>Add VueJS</li>
            <li>Add aiuth to logout middleware</li>
            <li>Move auth to auth folder</li>
            <li>Add note for 0 zones</li>
        </ul>
    </div>
</x-layout>

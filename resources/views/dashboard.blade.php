<x-app-layout>
    <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
    {{ __('Disastrix') }}
</h2>

    </x-slot>
    <script>
        window.onload=function()=>{
            window.location.href="user/role";
        }
    </script>
  
        
       
    <x-welcome />
</div>

        </div>
    </div>
</x-app-layout>

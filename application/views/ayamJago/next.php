<section class="content">
    <div class="box p-3 sm:p-6">
        <div class="box-header">
            <h1 class="text-4xl font-bold">Form Cek Ayam Jago</h1>
        </div>
        <div class="box-body mt-10 max-w-5xl">
            <div class="flex flex-col items-center  w-full border-b border-gray-300 pb-10">
                <div class="flex flex-col items-center sm:flex-row-reverse sm:items-start w-full gap-16 sm:gap-10">
                    <div class="">
                        <img src="" class="w-56 h-56 rounded-xl bg-gray-100" alt="">
                    </div>
                    <div class="flex flex-col gap-4 w-full sm:w-max flex-1 ">
                        <div class="flex gap-4 items-center">
                            <label for="id" class="basis-20 sm:basis-28">No.ID</label>
                            <input type="text" name="id" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="id">
                        </div>
                        <div class="flex gap-4 items-center">
                            <label for="nama" class="basis-20 sm:basis-28">Nama</label>
                            <input type="text" name="nama" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="nama">
                        </div>
                        <div class="flex gap-4 items-center">
                            <label for="ttl" class="basis-20 sm:basis-28">TTL</label>
                            <input type="text" name="ttl" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="ttl">
                        </div>
                        <div class="flex gap-4 items-center">
                            <label for="ttl" class="basis-20 sm:basis-28">Weton</label>
                            <input type="text" name="weton" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="weton">
                        </div>
                        <div class="flex gap-4 items-center">
                            <label for="ttl" class="basis-20 sm:basis-28">Usia</label>
                            <input type="text" name="usia" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="usia">
                        </div>
                    </div>

                </div>
                <div class="flex gap-10 mt-10">
                    <button class="px-6 py-2 rounded-lg bg-green-500 text-white">Lulus</button>
                    <button class="px-6 py-2 rounded-lg bg-red-500 text-white">Tidak Lulus</button>
                </div>
            </div>
            <div class="mt-10 flex flex-col">
                <div class="flex gap-4 flex-col items-start">
                    <label for="alasan" class="">Alasan</label>
                    <textarea name="alasan" id="" rows="6" class="w-full resize-none px-5 py-2 rounded-lg border border-gray-400"></textarea>
                </div>
                <button class="px-6 py-2 rounded-lg bg-blue-500 mt-6 text-white ml-auto">Submit</button>

            </div>
        </div>
    </div>
</section>
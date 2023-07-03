<section class="content">
    <div class="box p-3 sm:p-6">
        <div class="box-header">
            <h1 class="text-4xl font-bold">Form Cek Ayam Ciawi</h1>
        </div>
        <div class="box-body mt-10 max-w-5xl">
            <form action="<?= base_url('cekAyamCiawi/handleCreate') ?>" method="POST">
                <div class="flex flex-col items-center  w-full ">
                    <div class="flex flex-col items-center sm:flex-row-reverse sm:items-start w-full gap-16 sm:gap-10">
                        <div class="">
                            <img src="" class="w-56 h-56 rounded-xl bg-gray-100" alt="">
                        </div>
                        <div class="flex flex-col gap-4 w-full sm:w-max flex-1 ">
                            <div class="flex gap-4 items-center">
                                <label for="id" class="basis-20 sm:basis-28">No.ID</label>
                                <input type="text" value="<?= $ayamJago["id_ayam_jago"]; ?>" name="id_ayam_jago" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="id">
                            </div>
                            <div class="flex gap-4 items-center">
                                <label for="nama" class="basis-20 sm:basis-28">Nama</label>
                                <input type="text" value="<?= $ayamJago["nama"] ;?>" name="nama" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="nama">
                            </div>
                            <div class="flex gap-4 items-center">
                                <label for="ttl" class="basis-20 sm:basis-28">TTL</label>
                                <input type="text" value="<?= $ayamJago["tgl_lahir"]; ?>" name="ttl" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="ttl">
                            </div>
                            <div class="flex gap-4 items-center">
                                <label for="ttl" class="basis-20 sm:basis-28">Weton</label>
                                <input type="text" value="<?= $ayamJago["weton"]; ?>" name="weton" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="weton">
                            </div>
                            <div class="flex gap-4 items-center">
                                <label for="ttl" class="basis-20 sm:basis-28">Usia</label>
                                <input type="text" value="<?= $ayamJago["usia"]; ?>" name="usia" class="flex-1 px-5 py-2 rounded-lg border border-gray-400" id="usia">
                            </div>
                        </div>

                    </div>

                </div>

                <div class="mt-10 flex flex-col" action="<?= site_url("cekayamjago/handleCreate") ?>" method="POST">
                    <div class="w-full flex gap-10 mt-10 justify-center border-b-2 border-gray-200 pb-10">
                        <div class="relative">
                            <input type="radio" name="isLulus" class="peer absolute inset-0 opacity-0 cursor-pointer" value="lulus" id="">
                            <button class="px-6 py-2 rounded-lg bg-green-500 text-white peer-checked:bg-green-700">Lulus</button>
                        </div>
                        <div class="relative">
                            <input type="radio" name="isLulus" class="peer absolute inset-0 opacity-0 cursor-pointer" value="tidak lulus" id="">
                            <button class="px-6 py-2 rounded-lg bg-red-500 text-white peer-checked:bg-red-700">Tidak Lulus</button>
                        </div>
                    </div>
                    <div class="flex gap-4 flex-col items-start mt-10">
                        <label for="alasan" class="">Alasan</label>
                        <textarea name="alasan" id="" rows="6" class="w-full resize-none px-5 py-2 rounded-lg border border-gray-400"></textarea>
                    </div>
                    <button class="px-6 py-2 rounded-lg bg-blue-500 mt-6 text-white ml-auto">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
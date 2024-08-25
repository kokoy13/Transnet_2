<table class="px-3 table-auto border-collapse border w-full h-full">
                <thead class="sticky top-0">
                    <tr class="bg-cyan-400 border py-2">
                        <th></th>
                        <th class="">Nama Pelanggan</th>
                        <th class="">ID</th>
                        <th class="">SN ONT</th>
                        <th class="">Paket</th>
                        <th class="">Bandwith</th>
                        <th class="">Alamat</th>
                        <th class="">OLT</th>
                        <th class="">Kontak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach($show as $as) : ?>
                            <tr class="hover:bg-slate-100 border-b-cyan-400 border">
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm w-max border-r shadow-[1px_1px_3px_rgba(0,0,0,0.5)]">
                                    <div class="flex w-16 gap-1 items-center justify-center">
                                        <a href="updateCustomer.php?id=<?=$as["customerid"]?>">
                                            <img class="w-5 h-5" src="../assets/img/update.png" alt="">
                                        </a>
                                        <div class="bg-black rote w-[2px] h-6"></div>
                                        <a href="deleteCustomer.php?id=<?=$as["customerid"]?>&&snont=<?=$as["snont"]?>" onclick="konfirmasiSubmit(event)">
                                            <img class="w-5 h-5" src="../assets/img/delete.png" alt="">
                                        </a>
                                    </div>
                                </td>
                                <!-- NAMA CUSTOMER -->
                                <td class="px-3 w-max h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm flex items-center gap-2 font-medium">
                                    <?php
                                    if($as['packetservice'] == "Family"){ ?>
                                        <img class="w-8 h-8" src="../assets/img/family.png">
                                    <?php } else if($as['packetservice'] == "SME") { ?>
                                        <img class="w-8 h-8" src="../assets/img/dedicated.png">    
                                    <?php } else { ?>
                                        <img class="w-8 h-8" src="../assets/img/office.png" alt="">
                                    <?php } ?>
                                    <?=$as['customername'];?>
                                </td>
                                <!-- ID CUSTOMER -->
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm">
                                    <?=$as['customerid'];?>
                                </td>
                                <!-- SN ONT -->
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm">
                                    <?=$as['snont'];?>
                                </td>
                                <!-- PAKET LANGGANAN -->
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm text-center">
                                    <?php
                                        if($as['packetservice'] == "SME") { ?>
                                        <span class="px-5 py-1 border border-solid border-rose-500 bg-red-400 text-rose-1000 font-medium rounded-full">
                                    <?php }else if($as['packetservice'] == "Family") { ?>
                                        <span class="px-5 py-1 border border-solid border-emerald-500 bg-green-500 text-emerald-1000 font-medium rounded-full">
                                    <?php } else { ?>
                                        <span class="px-5 py-1 border border-solid border-amber-400 bg-yellow-400 text-amber-700 font-medium rounded-full">
                                    <?php } ?>
                                    <?=$as['packetservice'];?>
                                    </span>
                                </td>
                                <!-- BANDWITH -->
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm text-center">
                                    <?=$as['bandwith'];?> Mbps
                                </td>
                                <!-- ALAMAT -->
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm text-center">
                                    <a href="#" class="underline text-blue-600 font-medium hover:text-green-500 focus:text-red-400 transition duration-300">
                                    <?=$as['address'];?>
                                    </a>
                                </td>
                                <!-- OLT -->
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm text-center">
                                    <?=$as['olt'];?>
                                </td>
                                <!-- KONTAK -->
                                <td class="px-3 h-[100px] overflow-hidden whitespace-nowrap text-ellipsis text-sm text-center">
                                    <?=$as['contact'];?>
                                </td>
                            </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

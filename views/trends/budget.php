
<a href="/trends/budgets" class="inline-block underline mb-6">Back to budgets</a>


<?php if ( $data->transactions->monthly_net_totals ): ?>

    <section class="relative flex items-center gap-4 h-[230px] w-fit min-w-[300px] px-2 border border-slate-200 rounded-xl">

        <!-- X Axis Line -->
        <div class="absolute top-[100px] left-0 right-0 h-[1px] bg-slate-300"></div>

        <?php foreach ( $data->transactions->monthly_net_totals as $month => $total ): ?>

            <?php $bar_height = (int) ($total * $data->monthly_ratio); ?>

            <div class="relative h-[100%] w-16">

                <div class="absolute bottom-0 left-0 right-0 min-w-max text-center">
                    <?= (new DateTimeImmutable( $month ))->format('M y'); ?>
                </div>

                <div 
                    class="
                        absolute left-0 right-0 text-center text-xs
                        <?= $total >= 0
                            ? 'top-[105px]'
                            : 'bottom-[135px]';
                        ?>
                    "
                >
                    <?= $total >= 0 ? "+$total" : $total; ?>
                </div>

                <div 
                    class="
                        absolute left-0 right-0 rounded-sm
                        <?= $bar_height >= 0 
                            ? 'bottom-[128px] h-[' . $bar_height . 'px]      bg-gradient-to-b from-teal-200 to-teal-400'
                            : 'top-[100px]    h-[' . $bar_height * -1 . 'px] bg-gradient-to-t from-red-200  to-red-400';  
                        ?>
                    "
                ></div>
            </div>

        <?php endforeach; ?>
        
    </section>

<?php else: ?>

    <section class="flex flex-col gap-6">
        <p>
            This budget doesn't have any transactions yet. <a href="/transactions" class="underline">Add some</a>
        </p>

        <p>
            <a href="/trends/budgets" class="underline">Back to Budget Trends</a>
        </p>
    </section>

<?php endif; ?>

<section>

    <?php foreach ( $data->transactions->transactions_chunked_by_month as $key => $month ): ?>

        <div class="my-8">

            <h3 class="flex items-center justify-between font-bold text-xl border-b border-slate-200 pb-1 mb-2 text-teal-800">

                <?= (new DateTimeImmutable( $key ))->format('F Y'); ?>

                <span class="text-md font-normal">
                    <?= $data->transactions->monthly_net_totals[ $key ] > 0 ? '+' : ''; ?>
                    <?= $data->transactions->monthly_net_totals[ $key ]; ?>
                </span>

            </h3>


            <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-2 items-end">

                <?php foreach ( $month as $transaction ): ?>

                    <span class="font-bold">
                        <?= $transaction->name; ?>
                    </span>

                    <span class="text-sm">
                        <?= $transaction->amount; ?>
                    </span>

                <?php endforeach; ?>

            </div>

        </div>

    <?php endforeach; ?>

</section>
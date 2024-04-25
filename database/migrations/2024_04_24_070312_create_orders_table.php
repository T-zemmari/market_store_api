<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->string('customer_ip_address');
            $table->string('status')->default('pending'); //pending, processing, on-hold, completed, cancelled, refunded, failed , trash
            $table->string('currency')->default('EUR'); //AED, AFN, ALL, AMD, ANG, AOA, ARS, AUD, AWG, AZN, BAM, BBD, BDT, BGN, BHD, BIF, BMD, BND, BOB, BRL, BSD, BTC, BTN, BWP, BYR, BZD, CAD, CDF, CHF, CLP, CNY, COP, CRC, CUC, CUP, CVE, CZK, DJF, DKK, DOP, DZD, EGP, ERN, ETB, EUR, FJD, FKP, GBP, GEL, GGP, GHS, GIP, GMD, GNF, GTQ, GYD, HKD, HNL, HRK, HTG, HUF, IDR, ILS, IMP, INR, IQD, IRR, IRT, ISK, JEP, JMD, JOD, JPY, KES, KGS, KHR, KMF, KPW, KRW, KWD, KYD, KZT, LAK, LBP, LKR, LRD, LSL, LYD, MAD, MDL, MGA, MKD, MMK, MNT, MOP, MRO, MUR, MVR, MWK, MXN, MYR, MZN, NAD, NGN, NIO, NOK, NPR, NZD, OMR, PAB, PEN, PGK, PHP, PKR, PLN, PRB, PYG, QAR, RON, RSD, RUB, RWF, SAR, SBD, SCR, SDG, SEK, SGD, SHP, SLL, SOS, SRD, SSP, STD, SYP, SZL, THB, TJS, TMT, TND, TOP, TRY, TTD, TWD, TZS, UAH, UGX, USD, UYU, UZS, VEF, VND, VUV, WST, XAF, XCD, XOF, XPF, YER, ZAR and ZMW
            $table->decimal('discount_total', total: 8, places: 2)->default(0);
            $table->decimal('shipping_total', total: 8, places: 2);
            $table->string('tax_type')->default('percentage'); //percentage,amount
            $table->decimal('total_tax', total: 8, places: 2);
            $table->decimal('shipping_total_with_tax', total: 8, places: 2);
            $table->text('billing')->nullable();
            $table->text('shipping')->nullable();
            $table->string('payment_method');
            $table->string('payment_method_title');
            $table->dateTime('date_paid')->nullable();
            $table->dateTime('date_completed')->nullable();
            $table->json('line_items'); //De momento lo dejo nulo 
            $table->text('coupon_lines')->nullable(); //De momento lo dejo nulo 
            $table->text('set_paid')->default(false);
            $table->text('created_via')->default('rest_api');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

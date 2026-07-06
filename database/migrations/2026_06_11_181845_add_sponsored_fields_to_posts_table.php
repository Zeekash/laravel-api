<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'company_id')) {
                $table->unsignedBigInteger('company_id')->nullable()->after('admin_id');
            }

            if (!Schema::hasColumn('posts', 'post_type')) {
                $table->string('post_type')->default('normal')->after('post_category_id');
            }

            if (!Schema::hasColumn('posts', 'sponsored_status')) {
                $table->string('sponsored_status')->nullable()->after('post_type');
            }

            if (!Schema::hasColumn('posts', 'payment_status')) {
                $table->string('payment_status')->default('unpaid')->after('sponsored_status');
            }

            if (!Schema::hasColumn('posts', 'price')) {
                $table->decimal('price', 10, 2)->default(199.00)->after('payment_status');
            }

            if (!Schema::hasColumn('posts', 'currency')) {
                $table->string('currency', 10)->default('usd')->after('price');
            }

            if (!Schema::hasColumn('posts', 'approved_at')) {
                $table->timestamp('approved_at')->nullable()->after('published_at');
            }

            if (!Schema::hasColumn('posts', 'payment_due_at')) {
                $table->timestamp('payment_due_at')->nullable()->after('approved_at');
            }

            if (!Schema::hasColumn('posts', 'paid_at')) {
                $table->timestamp('paid_at')->nullable()->after('payment_due_at');
            }

            if (!Schema::hasColumn('posts', 'stripe_checkout_session_id')) {
                $table->string('stripe_checkout_session_id')->nullable()->after('paid_at');
            }

            if (!Schema::hasColumn('posts', 'stripe_payment_intent_id')) {
                $table->string('stripe_payment_intent_id')->nullable()->after('stripe_checkout_session_id');
            }

            if (!Schema::hasColumn('posts', 'admin_note')) {
                $table->text('admin_note')->nullable()->after('stripe_payment_intent_id');
            }

            if (!Schema::hasColumn('posts', 'revision_note')) {
                $table->text('revision_note')->nullable()->after('admin_note');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $columns = [
                'company_id',
                'post_type',
                'sponsored_status',
                'payment_status',
                'price',
                'currency',
                'approved_at',
                'payment_due_at',
                'paid_at',
                'stripe_checkout_session_id',
                'stripe_payment_intent_id',
                'admin_note',
                'revision_note',
            ];

            foreach ($columns as $column) {
                if (Schema::hasColumn('posts', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};

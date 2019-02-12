<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * 退款状态，未退款
     */
    const REFUND_STATUS_PENDING = 'pending';

    /**
     * 退款状态，申请
     */
    const REFUND_STATUS_APPLIED = 'applied';

    /**
     * 退款状态，处理中
     */
    const REFUND_STATUS_PROCESSING = 'processing';

    /**
     * 退款状态，成功
     */
    const REFUND_STATUS_SUCCESS = 'success';

    /**
     * 退款状态，失败
     */
    const REFUND_STATUS_FAILED = 'failed';

    /**
     * 物流状态，待发货
     */
    const SHIP_STATUS_PENDING = 'pending';

    /**
     * 物流状态，已发货
     */
    const SHIP_STATUS_DELIVERED = 'delivered';

    /**
     * 物流状态，已收货
     */
    const SHIP_STATUS_RECEIVED = 'received';

    /**
     * 退款状态map
     *
     * @var array
     */
    public static $refundStatusMap = [
        self::REFUND_STATUS_PENDING    => '未退款',
        self::REFUND_STATUS_APPLIED    => '已申请退款',
        self::REFUND_STATUS_PROCESSING => '退款中',
        self::REFUND_STATUS_SUCCESS    => '退款成功',
        self::REFUND_STATUS_FAILED     => '退款失败',
    ];

    /**
     * 物流状态map
     *
     * @var array
     */
    public static $shipStatusMap = [
        self::SHIP_STATUS_PENDING   => '未发货',
        self::SHIP_STATUS_DELIVERED => '已发货',
        self::SHIP_STATUS_RECEIVED  => '已收货',
    ];

    /**
     * 允许写入的字段
     *
     * @var array
     */
    protected $fillable = [
        'no',
        'address',
        'total_amount',
        'remark',
        'paid_at',
        'payment_method',
        'payment_no',
        'refund_status',
        'refund_no',
        'closed',
        'reviewed',
        'ship_status',
        'ship_data',
        'extra',
    ];

    /**
     * 将对应的字段属性转化为常见的数据类型
     *
     * @var array
     */
    protected $casts = [
        'closed'    => 'boolean',
        'reviewed'  => 'boolean',
        'address'   => 'json',
        'ship_data' => 'json',
        'extra'     => 'json',
    ];

    /**
     * 会被转化为日期的属性
     *
     * @var array
     */
    protected $dates = [
        'paid_at',
    ];

    protected static function boot()
    {
        parent::boot();
        // 监听模型创建事件，在写入数据库之前触发
        static::creating(function ($model) {
            // 如果模型的 no 字段为空
            if ( ! $model->no) {
                // 调用 findAvailableNo 生成订单流水号
                $model->no = static::findAvailableNo();
                // 如果生成失败，则终止创建订单
                if ( ! $model->no) {
                    return false;
                }
            }
        });
    }

    /**
     * 订单所属用户
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 订单中的商品
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function findAvailableNo()
    {
        // 订单流水号前缀
        $prefix = date('YmdHis');
        for ($i = 0; $i < 10; $i++) {
            // 生成随机6位数字
            $no = $prefix . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            // 判断是否已经存在
            if ( ! static::query()->where('no', $no)->exists()) {
                return $no;
            }
        }
        \Log::warning('find order no failed');

        return false;
    }
}

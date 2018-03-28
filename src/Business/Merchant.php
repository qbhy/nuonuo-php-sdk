<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 下午4:15
 */

namespace Qbhy\Nuonuo\Business;

/**
 * Class Merchant
 *
 * @link https://open.jss.com.cn//interplatform/getApiList.do?index=4
 * @package Qbhy\Nuonuo\Merchant
 */
class Merchant extends NuonuoBusiness
{
    /**
     * 订单列表查询接口
     *
     * @param string $companyId Y    HDNoUS15DFRBHH4156    36    商户唯一身份（由商家中心分配）
     * @param string $orderType Y    2    2    订单来源（1诺诺商城，2防伪税控，3自助缴费，4财税助手，5智能编码，6运营支撑平台，7众包平台，8云记账，9技服o2o，10电子税局）
     * @param string $startDate Y    2018-03-01 15:28:36    19    开始时间
     * @param string $endDate   Y    2018-03-09 15:28:36    19    结束时间
     * @param string $current   N    1    11    当前页码（每页显示条数50，若不填写默认为1）
     *
     * @return mixed
     */
    public function queryList($companyId, $orderType, $startDate, $endDate, $current)
    {
        return $this->request('nuonuo.order.queryList',
            compact('companyId', 'orderType', 'startDate', 'endDate', 'current')
        );
    }

    /**
     * 订单详情查询接口
     *
     * @param string $companyId Y    HDNoUS15DFRBHH4156    36    商户唯一身份（由商家中心分配）
     * @param string $id        Y    2018012552202002    36    订单编号
     *
     * @return mixed
     */
    public function detailsQuery($companyId, $id)
    {
        return $this->request('nuonuo.order.detailsQuery',
            compact('companyId', 'id')
        );
    }
}
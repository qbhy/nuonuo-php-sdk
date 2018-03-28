<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 下午4:20
 */

namespace Qbhy\Nuonuo\Business;

/**
 * Class SynergyOffice
 *
 * @link    https://open.jss.com.cn//interplatform/getApiList.do?index=5
 * @package Qbhy\Nuonuo\SynergyOffice
 */
class SynergyOffice extends NuonuoBusiness
{
    /**
     * 获取企业审批单据接口
     *
     * @param string $startTime Y    2017-01-01    10    筛选的起始时间
     * @param string $endTime   Y    2017-02-01    10    筛选的结束时间
     * @param string $status    N    1    1    -2已取消, -1 不同意, 0 待审批,1 同意（该版本只取状态为同意1的单据，其他的返回空）
     * @param string $applyType N    2    2    1 请假单 2 报销单
     *
     * @return mixed
     */
    public function approvalForm($startTime, $endTime, $status, $applyType)
    {
        return $this->request('nuonuo.synergy.approvalForm', compact('startTime', 'endTime', 'status', 'applyType'));
    }
}
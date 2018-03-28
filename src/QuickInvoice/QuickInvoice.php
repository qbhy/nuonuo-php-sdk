<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 下午3:21
 */

namespace Qbhy\Nuonuo\QuickInvoice;

use Qbhy\Nuonuo\Api;

class QuickInvoice extends Api
{
    /**
     * @param int $extensionNum 分机号，没有可不填或者填0
     *
     * @return array
     */
    public function querySpeedBilling($extensionNum = 0)
    {
        return $this->request('nuonuo.speedBilling.querySpeedBilling', compact('extensionNum'));
    }

    /**
     * @param string $kpCode       企业税号    91330000692368905R
     * @param string $kpName       企业名称    浙江爱信诺航天信息有限公司
     * @param string $kpTel        企业电话    0571-85022017
     * @param string $accountBlank 企业开户行    杭州工行古荡支行
     * @param string $bankAccount  银行账号（使用极速开票进行开票显示后六位）    1202005909900******
     * @param string $kpAddr       企业地址    杭州市万塘路30号12幢2楼
     * @param string $taxFlag      企业类别（0一般纳税人,1小规模,2个体工商户）    1
     * @param string $code         6位开票代码    ZJHTXX
     * @param string $systype      是否支持极速开票（1支持，其他为不支持）    1
     *
     * @return array
     */
    public function billingByCode($kpCode, $kpName, $kpTel, $accountBlank, $bankAccount, $kpAddr, $taxFlag, $code, $systype)
    {
        return $this->request('nuonuo.speedBilling.billingByCode',
            compact('kpCode', 'kpName', 'kpTel', 'accountBlank', 'bankAccount', 'kpAddr', 'taxFlag', 'code', 'systype')
        );
    }

    /**
     * @param $taxDiscNumber 金税盘号
     *
     * @return array
     */
    public function queryGoldenPlate($taxDiscNumber)
    {
        return $this->request('nuonuo.speedBilling.queryGoldenPlate', compact('taxDiscNumber'));
    }


}
<?php
/**
 * User: 96qbhy
 * Date: 2018/3/28
 * Time: 下午3:21
 */

namespace Qbhy\Nuonuo\Business;

/**
 * Class ElectronInvoice
 *
 * @link    https://open.jss.com.cn//interplatform/getApiList.do?index=2
 * @package Qbhy\Nuonuo\ElectronInvoice
 */
class ElectronInvoice extends NuonuoBusiness
{
    /**
     * 查询电子发票
     *
     * @param array $invoiceSerialNum 发票请求流水号，支持批量查询，最多50条
     *
     * @return array
     */
    public function checkEInvoice($invoiceSerialNum)
    {
        return $this->request('nuonuo.electronInvoice.CheckEInvoice', compact('invoiceSerialNum'));
    }

    /**
     * 申请开具电子发票
     *
     * @param array $order 发票订单(请求体)
     *
     * @return array
     */
    public function requestBilling($order)
    {
        /**
         * $order 应包含一下字段
         * buyerName    String    Y    浙江爱信诺航天信息有限公司    100    购方名称
         * buyerTaxNum    String    N    91330000692368905R    20    购方税号（企业要填，个人可为空）
         * buyerTel    String    N    0571-88888888    20    购方电话
         * buyerAdress    String    N    杭州市万塘路30号东方科技园12幢2楼    100    购方地址（企业要填，个人可为空）
         * buyerAccount    String    N    125000590990435128 杭州银行石桥支行    100    购方银行账号及开户行地址（企业要填，个人可为空）
         * orderNo    String    Y    20170104120207971529    20    订单号（每个企业唯一）
         * invoiceDate    String    Y    2016-01-13 12:30:00    20    订单时间
         * clerk    String    Y    张三    8    开票员
         * salerTaxNum    String    Y    330100555190356    20    销方税号
         * salerTel    String    Y    0571-81029365    20    销方电话
         * salerAddress    String    Y    杭州市西湖区万塘路30号高新东方科技园    80    销方地址
         * salerAccount    String    N    120200590990432278 杭州银行彭埠支行    100    销方银行账号和开户行地址
         * invoiceType    String    Y    1    1    开票类型:1,正票;2,红票
         * remark    String    N    备注信息    130    冲红时，在备注中注明“对应正数发票代码:XXXXXXXXX号码:YYYYYYYY”文案，其中“X”为发票代码，“Y”为发票号码，可以不填，接口会自动添加该文案
         * payee    String    N    李四    8    收款人
         * checker    String    N    王五    8    复核人
         * invoiceCode    String    N    125999915630    12    冲红时填写的对应蓝票发票代码（红票必填，不满12位请左补0）
         * invoiceNum    String    N    00130865    8    冲红时填写的对应蓝票发票号码（红票必填，不满8位请左补0）
         * pushMode    String    N    1    2    推送方式:-1,不推送;0,邮箱;1,手机（默认）;2,邮箱、手机
         * buyerPhone    String    Y    15858585858    20    购方手机（开票成功会短信提醒购方，不受推送方式影响）
         * email    String    N    test@xx.com    50    推送邮箱（pushMode为0或2时，此项为必填）
         * listFlag    String    N    0    1    清单标志:0,根据项目名称数，自动产生清单;1,将项目信息打印至清单
         * listName    String    N    详见销货清单    90    清单项目名称:打印清单时对应发票票面项目名称（listFlag为1是，此项为必填，默认为“详见销货清单”）
         * proxyInvoiceFlag    String    N    0    1    代开标志:0非代开;1代开。代开蓝票时备注要求填写文案：代开企业税号:***,代开企业名称:***；代开红票时备注要求填写文案：对应正数发票代码:***号码:***代开企业税号:***代开企业名称:***
         * departmentId    String    N    9F7E9439CA8B4C60A2FFF3EA3290B088    32    部门门店id（诺诺系统中的id）
         * clerkId    String    N    3F7EA439CA8B4C60A2FFF3EA3290B084    32    开票员id（诺诺系统中的id）
         * invoiceDetail Object Y    如下    100    电子发票明细，支持填写商品明细最大100行（包含折扣行、被折扣行）
         */
        /**
         * $order['invoiceDetail'] 应包含如下字段
         * goodsName    String    Y    电脑    90    商品名称（如invoiceLineProperty =1，则此商品行为折扣行，折扣行不允许多行折扣，折扣行必须紧邻被折扣行，商品名称必须与被折扣行一致）
         * num    String    N    2    16    数量（冲红时项目数量为负数）
         * withTaxFlag    String    Y    1    1    单价含税标志，0:不含税,1:含税
         * price    String    N    3099    16    单价
         * tax    String    N    1053.66    16    税额，[不含税金额] * [税率] = [税额]；税额允许误差为 0.06。红票为负。不含税金额、税额、含税金额任何一个不传时，会根据传入的单价，数量进行计算，可能和实际数值存在误差，建议都传入
         * taxIncludedAmount    String    N    6198    16    含税金额，[不含税金额] + [税额] = [含税金额]，红票为负。不含税金额、税额、含税金额任何一个不传时，会根据传入的单价，数量进行计算，可能和实际数值存在误差，建议都传入
         * taxExcludedAmount    String    N    5144.34    16    不含税金额。红票为负。不含税金额、税额、含税金额任何一个不传时，会根据传入的单价，数量进行计算，可能和实际数值存在误差，建议都传入
         * taxRate    String    Y    0.17    10    税率
         * specType    String    N    y460    40    规格型号
         * unit    String    N    台    20    单位
         * goodsCode    String    N    1090511030000000000    19    商品编码（商品税收分类编码开发者自行填写）
         * selfCode    String    N    130005426000000000    20    自行编码（可不填）
         * invoiceLineProperty    String    N    0    1    发票行性质:0,正常行;1,折扣行;2,被折扣行
         * favouredPolicyFlag    String    N    0    1    优惠政策标识:0,不使用;1,使用
         * favouredPolicyName    String    N    免税    50    增值税特殊管理（优惠政策名称）,当favouredPolicyFlag为1时，此项必填
         * zeroRateFlag    String    N    1    1    零税率标识:空,非零税率;1,免税;2,不征税;3,普通零税率
         * deduction    String    N    0    20    扣除额。差额征收时填写，目前只支持填写一项
         */

        return $this->request('nuonuo.electronInvoice.requestBilling', compact('order'));
    }


}
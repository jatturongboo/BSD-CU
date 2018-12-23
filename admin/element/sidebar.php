<div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                Fishing Equipment Store
            </a>
        </div>

        <ul class="nav">
            <li <?=(($menu == 'Dashboard')? 'class="active"' : '')?>>
                <a href="">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
			</br>
            <li <?=(($menu == 'registerAll')? 'class="active"' : '')?>>
                <a href="rods.php">
                    <i class="pe-7s-note2"></i>
                    <p>คันเบ็ดตกปลา</p>
                </a>
				<a href="">
                    <i class="pe-7s-note2"></i>
                    <p>รอกตกปลา</p>
                </a>
				<a href="">
                    <i class="pe-7s-note2"></i>
                    <p>อะไหล่รอกตกปลา</p>
                </a>
				<a href="">
                    <i class="pe-7s-note2"></i>
                    <p>เหยื่อปลอม</p>
                </a>
				<a href="">
                    <i class="pe-7s-note2"></i>
                    <p>สาย</p>
                </a>
				<a href="">
                    <i class="pe-7s-note2"></i>
                    <p>อุปกรณ์ปลายสาย</p>
                </a>
				</br>
				<a href="rod_power.php">
                    <i class="pe-7s-note2"></i>
                    <p>M-Rod Power</p>
                </a>
				<a href="rod_action.php">
                    <i class="pe-7s-note2"></i>
                    <p>M-Rod Action</p>
                </a>
				<a href="compare_strength.php">
                    <i class="pe-7s-note2"></i>
                    <p>M-Compare Strength</p>
                </a>
				
            </li>
<!--            <li class="active">
                <a href="">
                    <i class="pe-7s-upload"></i>
                    <p>สื่อการสอน</p>
                </a>
            </li>
            <li class="active">
                <a href="">
                    <i class="pe-7s-print"></i>
                    <p>พิมพ์รายชื่อผู้ลงทะเบียนทั้งหมดสำหรับแปะบอร์ด</p>
                </a>
            </li>
            <li class="active">
                <a href="">
                    <i class="pe-7s-print"></i>
                    <p>พิมพ์รายชื่อผู้รับใบประกาศนียบัตร</p>
                </a>
            </li>
            <li class="active">
                <a href="">
                    <i class="pe-7s-print"></i>
                    <p>พิมพ์ใบรับรองการเข้าร่วมประชุมวิชาการ</p>
                </a>
            </li>-->
        </ul>
    </div>
</div>
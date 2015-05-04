<div class="row">
    <h1>@{{ metal.name }}</h1>
    <div ng-show="metal.name == 'Aluminium'">
        <div class="col-md-5">
           <h3><strong>Aluminium 6082 (HE30)</strong></h3>
            <p>Aluminium alloy 6082 is a medium strength alloy with a great corrosion resistance. It has the highest strength of the 6000 series alloys. It is typically known a structural alloy due to its properties. </p>
            <br>
            <h4><strong>Applications of 6082</strong></h4>
            <ul>
                <li>Cranes</li>
                <li>Bridges</li>
                <li>Transport Applications</li>
                <li>Highly Stressed Applications</li>
                <li>Beers Barrels</li>
                <li>Milk Churns</li>
            </ul>
            <br>
            <h4><strong>Weldability</strong></h4>
                <p> Aluminium 6082 has a generally good weldability however its strength is lowered on the welding point/zone.</p>
                    <p><strong>Weladbility (Gas):</strong Good</p>
                    <p><strong>Weladbility (Arc):</strong Good</p>
                    <p><strong>Weladbility (Resistance):</strong Good</p>
                    <p><strong>Brazability:</strong> Good</p>
                    <p><strong>Solderability:</strong> Good</p>
            <h3 style="padding-top: 20%;">Not what you were looking for?</h3>
                <p>Use this selection box to navigate through the other types of metal and their properties.</p>
                @include('storefront.metalinfo')
        </div>
        <br>
        <div class="col-md-6">
        <br>
        <h4><strong>Generic Physical Properties</strong></h4>
            <table class="table table-bordered">
                <tbody>
                    <tr class="info">
                        <th style="width: 50%;">Property</th>
                        <th style="width: 50%;">Value</th>
                    </tr>
                    <tr>
                        <td>Density</td>
                        <td>2.70 g/cm^3</td>
                    </tr>
                    <tr>
                        <td>Melting Point</td>
                        <td>555 C</td>
                    </tr>
                    <tr>
                        <td>Thermal Expansion</td>
                        <td>24 x10^6 /k</td>
                    </tr>
                    <tr>
                        <td>Modulus of Elasticity</td>
                        <td>70 GPa</td>
                    </tr>
                    <tr>
                        <td>Thermal Conductivity</td>
                        <td>180 W/m.K</td>
                    </tr>
                    <tr>
                        <td>Electrical Resistivity</td>
                        <td>0.038 x10^6 Ohm .m</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h4><strong>Composition</strong></h4>
            <table class="table table-bordered">
                    <tbody>
                        <tr class="info">
                            <th style="width: 50%;">Chemical Element</th>
                            <th style="width: 50%;">Weight %</th>
                        </tr>
                        <tr>
                            <td>Aluminium (AL)</td>
                            <td>Balanced</td>
                        </tr>
                        <tr>
                            <td>Silicon (Si)</td>
                            <td>0.70-1.30</td>
                        </tr>
                        <tr>
                            <td>Iron (Fe)</td>
                            <td>0.50 max</td>
                        </tr>
                        <tr>
                            <td>Copper (Cu)</td>
                            <td>0.10 max</td>
                        </tr>
                        <tr>
                            <td>Manganese (Mn)</td>
                            <td>0.40-1.00</td>
                        </tr>
                        <tr>
                            <td>Chromium (Cr)</td>
                            <td>0.25 max</td>
                        </tr>
                        <tr>
                            <td>Magnesium (Mg)</td>
                            <td>0.06-1.20</td>
                        </tr>
                        <tr>
                            <td>Zinc (Zn)</td>
                            <td>0.20 max</td>
                        </tr>
                        <tr>
                            <td> Titanium (Ti)</td>
                            <td>0.10 max</td>
                        </tr>
                        <tr>
                            <td>Others Each</td>
                            <td>0.05 max</td>
                        </tr>
                        <tr>
                            <td>Others Total</td>
                            <td>0.15 max</td>
                        </tr>
                    </tbody>
                </table>
        <br>
       </div>
    </div>

    <div ng-show="metal.name == 'Stainless Steel'">
        <div class="col-md-5">
        <h3><strong>Stainless Steel 303</strong></h3>
        <p>Stainless steel type 1.4305 is popularly known as grade 303 stainless steel. It is the most readily machinable of all the austenitic grades of stainless steel</p>
        <br>
        <h4><strong>Key Features</strong></h4>
            <ul>
                <li> Highly Machinable</li>
            </ul>
        <h4><strong>Applications of 303</strong></h4>
            <p>Typically used in heavily machinable parts:</p>
            <ul>
                <li>Nuts and Bolts</li>
                <li>Screws</li>
                <li>Gears</li>
                <li>Aircraft Fittings</li>
                <li>Bushings</li>
                <li>Shafts</li>
            </ul>
        <h4><strong>Weldability</strong></h4>
            <p>The sulphur addition present in 303 stainless steel results in poor weldability. If 303 must be welded the recommended filler rods or electrodes are grades 308L and 309 stainless steels. For maximum corrosion resistance, the welds must be annealed.</p>
            <br>
        <h4><strong>Corrosion Resistance</strong></h4>
            <p>Sulphur additions to the composition act as initiation sites for pitting corrosion. This decreases the corrosion resistance of 303 stainless steel to less than that for 304. However. corrosion resistance remains good in mild environments.</p>
            <p>In chloride containing environments over 60C, 303 stainless steel is subject to pitting and crevice corrosion. Grade 303 stainless is not suitable for use in marine environments.</p>
        <h3 style="padding-top: 20%;">Not what you were looking for?</h3>
            <p>Use this selection box to navigate through the other types of metal and their properties.</p>
            @include('storefront.metalinfo')

        </div>
        <div class="col-md-6">
            <br>
            <h4><strong>Generic Physical Properties</strong></h4>
            <table class="table table-bordered">
                <tbody>
                    <tr class="info">
                        <th style="width: 50%;">Property</th>
                        <th style="width: 50%;">Value</th>
                    </tr>
                    <tr>
                        <td>Density</td>
                        <td>8.03 g/cm^3</td>
                    </tr>
                    <tr>
                        <td>Melting Point</td>
                        <td>1455 C</td>
                    </tr>
                    <tr>
                        <td>Thermal Expansion</td>
                        <td>17.3 x10^6 /K</td>
                    </tr>
                    <tr>
                        <td>Modulus of Elasticity</td>
                        <td>193 GPa</td>
                    </tr>
                    <tr>
                        <td>Thermal Conductivity</td>
                        <td>16.3 W/m.K</td>
                    </tr>
                    <tr>
                        <td>Electrical Resistivity</td>
                        <td>0.072 x10^6 Ohm .m</td>
                    </tr>
                </tbody>
            </table>
            <br>
            <h4><strong>Chemical Composition</strong></h4>
            <table class="table table-bordered">
                <tbody>
                    <tr class="info">
                        <th style="width: 50%;">Chemical Element</th>
                        <th style="width: 50%;">Weight %</th>
                    </tr>
                    <tr>
                        <td>Chromium (Cr)</td>
                        <td>17.00 - 19.00</td>
                    </tr>
                    <tr>
                        <td>Nickel (Ni)</td>
                        <td>8.00 - 10.00</td>
                    </tr>
                    <tr>
                        <td>Manganese (Mn)</td>
                        <td>0.0 - 2.00</td>
                    </tr>
                    <tr>
                        <td>Copper (Cu)</td>
                        <td>0.0 - 1.00</td>
                    </tr>
                    <tr>
                        <td>Silicon (Si)</td>
                        <td> 0.0 - 1.00</td>
                    </tr>
                    <tr>
                        <td>Sulphur (S)</td>
                        <td>0.15 - 0.35</td>
                    </tr>
                    <tr>
                        <td>Nitrogen (N)</td>
                        <td>0.0 - 0.11</td>
                    </tr>
                    <tr>
                        <td>Carbon (C)</td>
                        <td>0.0 - 0.10</td>
                    </tr>
                    <tr>
                        <td>Phosphorous (P)</td>
                        <td>0.0 - 0.05</td>
                    </tr>
                    <tr>
                        <td>Iron (Fe)</td>
                        <td>Balance</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div ng-show="metal.name == 'Brass'">
        <div class="col-md-5">
        <h3><strong>Brass CZ121</strong></h3>
            <p>Brasses are alloys of Copper and Zinc. They may also contain small amounts of other alloying elements to impart advantageous properties. Brasses have high corrosion resistance and high tensile strength. They are also suited to fabrication by hot forging. Free machining grades of brass set the standard for machining, by which other metals are compared. Brasses are divided into two classes. The alpha alloys, with less than 37% Zinc, and the alpha/beta alloys with 37-45% Zinc. Alpha alloys are ductile and can be cold worked. Alpha/beta or duplex alloys have limited cold ductility and are harder and stronger. CZ121 / CW614N is an alpha/beta alloy. Brass alloy CZ121 / CW614N is used for machining. It has Lead added to the composition to improve machinability. The Lead remains insoluble in the microstructure of the brass and the soft particles act as chip breakers.</p>
            <br>
        <h4><strong>Applications of CZ121</strong></h4>
            <ul>
                <li>High speed machined components</li>
                <li>Architectural extrusions</li>
                <li>Locks</li>
                <li>Hinges</li>
            </ul>
            <br>
        <h4><strong>Weldability</strong></h4>
            <p>Soldering of CZ121/CW614N is rated as excellent and brazing is good. Butt welding is fair but all other welding methods are not recommended.</p>
            <br>
        <h4><strong>Corrosion Resistance</strong></h4>
            <p>The corrosion resistance of CZ121/CW614N is fair to excellent.</p>
        <h3 style="padding-top: 20%;">Not what you were looking for?</h3>
            <p>Use this selection box to navigate through the other types of metal and their properties.</p>
            @include('storefront.metalinfo')
        </div>

        <div class="col-md-6">
            <br>
            <h4><strong>Generic Physical Properties</strong></h4>
            <table class="table table-bordered">
                <tbody>
                <tr class="info">
                    <th style="width: 50%;">Property</th>
                    <th style="width: 50%;">Value</th>
                </tr>
                <tr>
                    <td>Density</td>
                    <td>8.47 g/cm^3</td>
                </tr>
                <tr>
                    <td>Melting Point</td>
                    <td>875 C</td>
                </tr>
                <tr>
                    <td>Thermal Expansion</td>
                    <td>20.9 x10^6 /K</td>
                </tr>
                <tr>
                    <td>Modulus of Elasticity</td>
                    <td>97 GPa</td>
                </tr>
                <tr>
                    <td>Thermal Conductivity</td>
                    <td>123 W/m.K</td>
                </tr>
                <tr>
                    <td>Electrical Resistivity</td>
                    <td>0.062 x10^6 Ohm .m</td>
                </tr>
                </tbody>
            </table>
            <br>
            <h4><strong>Chemical Composition</strong></h4>
            <table class="table table-bordered">
                <tbody>
                <tr class="info">
                    <th style="width: 50%;">Chemical Element</th>
                    <th style="width: 50%;">Weight %</th>
                </tr>
                <tr>
                    <td>Copper (Cu)</td>
                    <td>57.00 - 59.00</td>
                </tr>
                <tr>
                    <td>Lead (Pb)</td>
                    <td>2.50 - 3.50</td>
                </tr>
                <tr>
                    <td>Iron (Fe)</td>
                    <td>0.0 - 0.30</td>
                </tr>
                <tr>
                    <td>Nickel(Ni)</td>
                    <td>0.0 - 0.30</td>
                </tr>
                <tr>
                    <td>Tin (Sn)</td>
                    <td>0.0 - 0.30</td>
                </tr>
                <tr>
                    <td>Others (Total)</td>
                    <td>0.0 - 0.20</td>
                </tr>
                <tr>
                    <td>Aluminium (Al)</td>
                    <td>0.0 - 0.05</td>
                </tr>
                <tr>
                    <td>Zinc (Zn)</td>
                    <td>Balance</td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div ng-show="metal.name == 'Copper'">
        <div class="col-md-5">
        <h3><strong>Copper CZ108</strong></h3>
            <p>Brasses are alloys of Copper and Zinc. They may also contain small amounts of other alloying elements to impart advantageous properties. Brasses have high corrosion resistance and high tensile strength. They are also suited to hot forging. Free machining brass sets the standard for machining, by which other metals are compared. Brasses are divided into two classes. The alpha alloys, with less than 37% zinc, and the alpha/beta alloys with 37-45% zinc. Alpha alloys are ductile and can be cold worked. Alpha/beta or duplex alloys have limited cold ductility and are harder and stronger. CZ108 / CW508L is an alpha alloy. CZ108/CW508L is a high purity cold forming brass. It is used when severe bending properties are required. It can be machined but only with slow speeds and very light feeds.</p>
            <br>
        <h4><strong>Applications of CZ121</strong></h4>
            <ul>
                <li>Scientific Applications</li>
                <li>Radiators</li>
                <li>Heat Exchangers</li>
                <li>Decorative</li>
            </ul>
            <br>
        <h4><strong>Weldability</strong></h4>
            <p>Soldering and brazing of CZ108/CW508L are both rated as “excellent”. Oxyacetylene welding is “good” and gas shielded methods are only “fair”. Resistance flash butt-welding may also be used.</p>
            <br>
        <h4>Corrosion Resistance</strong></h4>
            <p>The corrosion resistance of CZ108/CW508L is good to excellent in most environments. It is not suited for use with acetic acid, moist ammonia or ammonia compounds, hydrochloric acid and nitric acid.</p>
        <h3 style="padding-top: 20%;">Not what you were looking for?</h3>
            <p>Use this selection box to navigate through the other types of metal and their properties.</p>
            @include('storefront.metalinfo')

        </div>
        <div class="col-md-6">
            <h4><strong>Generic Physical Properties</strong></h4>
            <table class="table table-bordered">
                <tbody>
                <tr class="info">
                    <th style="width: 50%;">Property</th>
                    <th style="width: 50%;">Value</th>
                </tr>
                <tr>
                    <td>Density</td>
                    <td>8.44 g/cm^3</td>
                </tr>
                <tr>
                    <td>Melting Point</td>
                    <td>916 C</td>
                </tr>
                <tr>
                    <td>Thermal Expansion</td>
                    <td>20.5 x10^6 /K</td>
                </tr>
                <tr>
                    <td>Modulus of Elasticity</td>
                    <td>103.4 GPa</td>
                </tr>
                <tr>
                    <td>Thermal Conductivity</td>
                    <td>116 W/m.K</td>
                </tr>
                </tbody>
            </table>
            <br>
            <h4><strong>Chemical Composition</strong></h4>
            <table class="table table-bordered">
                <tbody>
                <tr class="info">
                    <th style="width: 50%;">Chemical Element</th>
                    <th style="width: 50%;">Weight</th>
                </tr>
                <tr>
                    <td>Copper (Cu)</td>
                    <td>62.00 - 64.00</td>
                </tr>
                <tr>
                    <td>Nickel (Ni)</td>
                    <td>0.0 - 0.30</td>
                </tr>
                <tr>
                    <td>Lead (Pb)</td>
                    <td>0.0 - 0.10</td>
                </tr>
                <tr>
                    <td>Iron (Fe)</td>
                    <td>0.0 - 0.10</td>
                </tr>
                <tr>
                    <td>Tin (Sn)</td>
                    <td>0.0 - 0.10</td>
                </tr>
                <tr>
                    <td>Aluminium (Al)</td>
                    <td>0.0 - 0.05</td>
                </tr>
                <tr>
                    <td>Zinc (Zn)</td>
                    <td>Balance</td>
                </tr>
                <tr>
                    <td>Others (Total)</td>
                    <td> 0.0 - 0.20</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
